package com.geomobile.rc663;


import java.util.ArrayList;
import java.util.List;
import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;

import com.geomobile.rc6633.R;


import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.SharedPreferences.Editor;
import android.os.Bundle;
import android.telephony.TelephonyManager;
import android.util.Log;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.CompoundButton;
import android.widget.EditText;


public class login extends ScanActivity implements OnClickListener {
    /** Called when the activity is first created. */
	private static final String TAG = "rc663_15693_java";
	private Button bnlogin;
	private EditText name;
	private EditText pass;
	private String imei="";
	private IOCallback submitController = null;
	public ScanActivity my=this;
	private CheckBox rem_pw;
	private SharedPreferences sp;  
	public String myURL; 
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.login);
        bnlogin = (Button)findViewById(R.id.button_in);
        bnlogin.setOnClickListener(this);
        rem_pw = (CheckBox) findViewById(R.id.rmb);
        name=(EditText)findViewById(R.id.editText_name);
        pass=(EditText)findViewById(R.id.editText_pass);
        TelephonyManager telephonyManager = (TelephonyManager)getSystemService(Context.TELEPHONY_SERVICE);
        this.imei = telephonyManager.getDeviceId();
        this.myURL= getString(R.string.url_prefix) + "login";
        sp = this.getSharedPreferences("userInfo_3", Context.MODE_PRIVATE);
        if(sp.getBoolean("ISCHECK", false))  
        {
        	 rem_pw.setChecked(true);  
             name.setText(sp.getString("USER_NAME", ""));  
             pass.setText(sp.getString("PASSWORD", ""));  
        }
        //������ס�����ѡ��ť�¼�  
        rem_pw.setOnCheckedChangeListener(new CheckBox.OnCheckedChangeListener() {  
            public void onCheckedChanged(CompoundButton buttonView,boolean isChecked) {  
                if (rem_pw.isChecked()) {   
                   // System.out.println("��ס������ѡ��");  
                    sp.edit().putBoolean("ISCHECK", true).commit();  
                }else {  
                   // System.out.println("��ס����û��ѡ��");  
                    sp.edit().putBoolean("ISCHECK", false).commit();  
                }  
            }  
        }); 
    }

    public class SubmitCallbackController implements IOCallback {
		login activity;
    	ProgressDialog progDialog;
    	List<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>();
    	public SubmitCallbackController(login activity, JSONObject postJson) {
    		this.activity = activity;
    		NameValuePair postContent = new BasicNameValuePair("txt_json", postJson.toString());
    		nameValuePairs.add(postContent);
    		new LongRunningGetIO(activity.myURL, nameValuePairs, this).execute();
    		
    		progDialog = ProgressDialog.show(activity, "���ڵ�¼",
    	            "��¼�����Ժ�...", true);
    	}
    	
    	public void httpRequestDidFinish(int success, String value) {
    		progDialog.dismiss();
    		//�жϺ�̨���ص�code
    		if (value.equals("0"))
    		{
    			if(rem_pw.isChecked())  
                {  
                 //��ס�û��������롢  
                  Editor editor = sp.edit();  
                  editor.putString("USER_NAME", name.getText().toString());  
                  editor.putString("PASSWORD",pass.getText().toString());  
                  editor.commit();  
                } 
				else
				{name.setText("");
				pass.setText("");}
				Intent i = new Intent();
				i.setClass(my, Scan4.class);
				startActivity(i);
    		}else if(value.equals("1"))
    			DialogUtil.showDialog(my, "����������", false);
    		else if(value.equals("2"))
    			DialogUtil.showDialog(my, "���豸δע��", false);
    		else if (value.equals("3"))
    			DialogUtil.showDialog(my, "�û������������", false);
    		else if (value.equals("4"))
    			DialogUtil.showDialog(my, "���ʺ����ڴ��豸�����д�������Ȩ��", false);
    		else
    			DialogUtil.showDialog(my, value, false);
	        activity.submitController = null;
    	}
    }
	// ���û�������û������������У��
	private boolean validate()
	{
		String username = name.getText().toString().trim();
		if (username.equals(""))
		{
			DialogUtil.showDialog(this, "����д�û�����", false);
			return false;
		}
		String pwd = pass.getText().toString().trim();
		if (pwd.equals(""))
		{
			DialogUtil.showDialog(this, "����д���룡", false);
			return false;
		}
		return true;
	}

	@Override
	public void onClick(View arg0) {
		// TODO Auto-generated method stub		
		if(arg0 == bnlogin) {			
			//test user authentication 
			if (validate())
			{
				String username = name.getText().toString();
				String pwd = pass.getText().toString();
				JSONObject myupload = new JSONObject();
				try {
					myupload.put("user", username);
					myupload.put("pass", pwd);
					myupload.put("imei", imei);
					//4Ϊ�����ֵ�type
					myupload.put("type", 4);
				} catch (JSONException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
				if(submitController == null) submitController = new SubmitCallbackController(this,myupload);
			}
			
		}
	}
}