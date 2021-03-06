package com.geomobile.rc663;

import com.android.hflibs.Iso15693_native;
import com.geomobile.rc6631.R;

import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.DialogInterface.OnCancelListener;
import android.os.Bundle;
import android.telephony.TelephonyManager;
import android.text.method.ScrollingMovementMethod;
import android.util.Log;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.Spinner;
import android.widget.TextView;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.*;

public class Scan2 extends ScanActivity implements OnClickListener {
    /** Called when the activity is first created. */
	
	private static final String TAG = "rc663_15693_java";
	private static final String PW_DEV = "/proc/driver/as3992";
	private Iso15693_native dev = new Iso15693_native();

	private Button get_info;
	private Button submit;
	private TextView main_info;

	private DeviceControl power;
	private Spinner spinner2;
	private ListView listView;
	private EditText editText1;
	

	private String imei = "";
	private ArrayAdapter adapter;
	// private String[] myStringArray = {"gen1", "gen2"};
	private List<String> items = new ArrayList<String>();
	private IOCallback fetchController = null, submitController = null;
	private HashMap<String, String> wasteOptionsMap = new HashMap<String, String>();
	private HashMap<String, String> wasteItemTypeMap = new HashMap<String, String>();
	private HashMap<String, String> wasteItemSNMap = new HashMap<String, String>();
	
	
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.scan2);
        
        TelephonyManager telephonyManager = (TelephonyManager)getSystemService(Context.TELEPHONY_SERVICE);
        this.imei = telephonyManager.getDeviceId(); 
        get_info = (Button)findViewById(R.id.button_15693_search);
        get_info.setOnClickListener(this);
        get_info.setEnabled(true);

        main_info = (TextView)findViewById(R.id.textView_15693_info);
        main_info.setMovementMethod(ScrollingMovementMethod.getInstance());
 
  
        power = new DeviceControl();
        if(power.DeviceOpen(PW_DEV) < 0)
        {
        	main_info.setText(R.string.msg_error_power);
        	return;
        }
        Log.d(TAG, "open file ok");
        
        if(power.PowerOnDevice() < 0)
        {
        	power.DeviceClose();
        	main_info.setText(R.string.msg_error_power);
        	return;
        }
        Log.d(TAG, "open power ok");
        
        try {
			Thread.sleep(100);
		} catch (InterruptedException e) {
			// TODO Auto-generated catch block
		}
        
        Log.d(TAG, "begin to init");
        if(dev.InitDevice() != 0)
        {
        	power.PowerOffDevice();
        	power.DeviceClose();
        	main_info.setText(R.string.msg_error_dev);
        	return;
        }
        Log.d(TAG, "init ok");
        get_info.setEnabled(true);
        
        
    }
    
    @Override
    public void onDestroy()
    {
    	Log.d(TAG, "on destory");
    	dev.ReleaseDevice();
    	power.PowerOffDevice();
    	power.DeviceClose();
    	super.onDestroy();
    }
    
    public void debugMessage(String msg)
    {
    	TextView main_info = (TextView)findViewById(R.id.textView_15693_info);
		main_info.setText(msg);
    }
    
    public class NullCallback implements IOCallback {
    	public void httpRequestDidFinish(int success, String value) {
    		
    	}
    }
    
    
    public class FetchItemCallbackController implements IOCallback {
    	Scan2 activity;
    	String sn;
    	ProgressDialog progDialog;
    	LongRunningGetIO running;
    	List<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>();
    	public FetchItemCallbackController(final Scan2 activity, String sn) {
    		this.sn = sn;
    		this.activity = activity;
    		//在这里向后台发起请求
    		running=new LongRunningGetIO(getString(R.string.url_prefix) + "getRfidWasteName?imei=" + activity.imei + "&rfid=" + sn, nameValuePairs, this);
    		running.execute();
    		//该progDialog可以取消，在下面进行设置
    		progDialog = ProgressDialog.show(activity, "正在获取信息",
    	            "请稍候...", true,true,new OnCancelListener(){
    			public void onCancel(DialogInterface pd)//fecth只是读取，可以取消
    			{
    				running.handleOnBackButton();
    				activity.fetchController = null;
    			}
    		} );
    	}
    	
    	public void parseJSON(String value) throws JSONException
    	{
    		JSONObject jObject = new JSONObject(value);
    		//判断类型，桶装or袋装
    		if (jObject.getString("way").equals("0"))
    		activity.popupEditText(sn, "原先数值: " + jObject.getString("total")+"公斤", jObject);
    		else if (jObject.getString("way").equals("1"))
        		activity.popupEditText(sn, "原先数值: " + jObject.getString("total")+"个", jObject);
    		else
    		{
    			activity.alertMessage("出现错误" + value);
    		}
    	}
    	
    	public void httpRequestDidFinish(int success, String value)
    	{
    		Log.d(TAG, value);
    		try {
				parseJSON(value);
			} catch (JSONException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
				try {
					JSONObject jObject = new JSONObject(value);
					String errmsg = "出现错误\n";
					if(jObject.get("error") instanceof JSONArray) {
						JSONArray jArr = (JSONArray)jObject.get("error");
						for(int i = 0; i < jArr.length(); i++) {
							JSONObject jj = jArr.getJSONObject(i);
							if (jj.has("rfid"))
							errmsg += jj.getString("rfid") + ": " + jj.getString("des") + "\n";
						}
					} else {
						JSONObject jj=(JSONObject)(jObject.get("error"));
						if (jj.has("rfid"))
						errmsg += jj.getString("rfid")+": " ; 
						errmsg+=  jj.getString("des") + "\n";
					}
					activity.alertMessage(errmsg);
				} catch (JSONException e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
					if(value.contains("error")) {
						activity.alertMessage("出现错误" + value);
					} else {
						activity.alertMessage("未知错误" + value);
					}
				}
			}
    		progDialog.dismiss();
    		activity.fetchController = null;
    	}
    }
    
    public class SubmitCallbackController implements IOCallback {
    	Scan2 activity;
    	ProgressDialog progDialog;
    	LongRunningGetIO running;
    	List<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>();
    	public SubmitCallbackController(final Scan2 activity, JSONObject postJson) {
    		this.activity = activity;
    		NameValuePair postContent = new BasicNameValuePair("txt_json", postJson.toString());
    		nameValuePairs.add(postContent);
    		running=new LongRunningGetIO(getString(R.string.url_prefix) + "addWaste", nameValuePairs, this);
    		running.execute();
    		
    		progDialog = ProgressDialog.show(activity, "正在上传",
    	            "请稍候...", true);//会修改数据库，不能取消
    	}
    	private void parseJSON(String value)
    	{
    		ErrorParser.parse(activity, value);
    		
    	}
    	
    	public void httpRequestDidFinish(int success, String value) {
    		progDialog.dismiss();
    		this.parseJSON(value);
	        
	        activity.submitController = null;
    	}
    }
    
    public void popupEditText(final String sn, String value, final JSONObject original)
    {
    	//弹出选择框
    	AlertDialog.Builder alert = new AlertDialog.Builder(this);

    	alert.setTitle("新增重量");
    	alert.setMessage("RFID: " + sn + "\n" + value);

    	// Set an EditText view to get user input 
    	final EditText input = new EditText(this);
    	input.setText("");
    	alert.setView(input);
    	
    	final Scan2 myself = this;

    	alert.setPositiveButton("确定", new DialogInterface.OnClickListener() {
    	public void onClick(DialogInterface dialog, int whichButton) {
    	    try {
    	    	Double.parseDouble(input.getText().toString());
    	    } catch(NumberFormatException nfe) {
    	    	myself.alertMessage("请输入数字");
    	    	return;
    	    }
    	    try {
    	    	Integer.parseInt(input.getText().toString());
    	    } catch(NumberFormatException nfe) {
    	    	try {
					if(Integer.parseInt(original.getString("way")) == 1) {
						myself.alertMessage("请输入整数");
						return;
					}
				} catch (NumberFormatException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				} catch (JSONException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
    	    }
    	  // Do something with value!
    		JSONObject toUpload = new JSONObject();
    		
    		try {
    			//组装向后台发送的json数据包
    			toUpload.put("rfid", sn);
				toUpload.put("wasteid", original.getString("id"));
				toUpload.put("imei", myself.imei);
				toUpload.put("addway", original.getString("way"));
				toUpload.put("addnum", input.getText());
				
				myself.readyToSubmit(toUpload);
			} catch (JSONException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
    		
    		
    	  }
    	});

    	alert.setNegativeButton("取消", new DialogInterface.OnClickListener() {
    	  public void onClick(DialogInterface dialog, int whichButton) {
    	    // Canceled.
    	  }
    	});

    	alert.show();
    }
    
    public void readyToSubmit(JSONObject content)
    {
    	this.submitController = new SubmitCallbackController(this, content);
    }
    
	@Override
	public void onClick(View arg0) {
		// TODO Auto-generated method stub
		if(arg0 == get_info)
		{
			Log.d(TAG, "get_info clicked");
			
			final ProgressDialog scanningDialog = ProgressDialog.show(this, "正在扫描 RFID 设备",
    	            "请稍候...", true);
			Thread newThread = new Thread() {
				@Override
				public void run() {
					try {
						sleep(1000);
						scanningDialog.dismiss();
					} catch (InterruptedException e) {
						scanningDialog.dismiss();
						e.printStackTrace();
					}
				}
			};
			newThread.start();
			
			String sn = Scanner.scan();
			if(sn == null) {
				this.alertMessage("未找到 RFID 设备");
				return;
			}
			
			
			if(fetchController == null)
				fetchController = new FetchItemCallbackController(this, sn);
			
		}
	}
    
}
