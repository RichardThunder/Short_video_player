package com.example.mini_tiktok;


import android.annotation.SuppressLint;
import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.graphics.Bitmap;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.net.Uri;
import android.net.http.SslError;
import android.os.Build;
import android.os.Bundle;
import android.os.Environment;
import android.support.annotation.Nullable;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.KeyEvent;
import android.view.View;

import android.view.Menu;
import android.view.MenuItem;
import android.webkit.SslErrorHandler;
import android.webkit.ValueCallback;
import android.webkit.WebChromeClient;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.FrameLayout;
import android.widget.ProgressBar;
import android.widget.Toast;

import java.io.File;


public class MainActivity extends AppCompatActivity {


    //    private Bundle bundle;
//    private WebView webView;
//    private FrameLayout frameLayout;
//    private ProgressDialog progressDialog;
//    private ValueCallback<Uri> uploadFile;
//    private ValueCallback<Uri[]> uploadFiles;
//    @Override
//    protected void onCreate(Bundle savedInstanceState) {
//        super.onCreate(savedInstanceState);
//        setContentView(R.layout.activity_main);
////Hide nav bar and status bar
//        hideSystemUI();
//        WebView webView = findViewById(R.id.web_view);
//        webView.requestFocusFromTouch();
//        webView.getSettings().setJavaScriptEnabled(true);
//        //webView.getSettings().setLoadWithOverviewMode(true);
//        // webView.getSettings().setUseWideViewPort(true);
//
//
//        webView.setWebViewClient(new WebViewClient() {
//            @Override
//            public boolean shouldOverrideUrlLoading(WebView view, String url) {
//                view.loadUrl(url);
//                return true;
//            }
//            @Override
//            public void onReceivedSslError(WebView view, SslErrorHandler handler, SslError error) {
//                handler.proceed();
//            }
//            @Override
//            public void onPageFinished(WebView view, String url) {
//                super.onPageFinished(view, url);
//            }
//
//            @Override
//            public void onPageStarted(WebView view, String url, Bitmap favicon) {
//                super.onPageStarted(view, url, favicon);
//            }
//
//            @Override
//            public void onLoadResource(WebView view, String url) {
//                super.onLoadResource(view, url);
//            }
//        });
//
//
//        WebSettings webSettings=webView.getSettings();
//        webSettings.setJavaScriptEnabled(true);   //支持js
//        webSettings.setAllowFileAccess(true);     //设置可以访问文件
//        webSettings.setBlockNetworkImage(false);
//        webSettings.setLoadWithOverviewMode(true);
//        webSettings.setDomStorageEnabled(true);
//        webSettings.setAppCacheMaxSize(1024 * 1024 * 80);
//        //设置缓存路径
//        String appCacheDir;
//        appCacheDir = "com.example.mini_tiktok/cache";
//        File fileSD = new File(appCacheDir);
//        if (!fileSD.exists()) {
//            fileSD.mkdir();
//        }
//        webSettings.setAppCachePath(appCacheDir);
//        webSettings.setAllowContentAccess(true);
//        webSettings.setAppCacheEnabled(true);
//        webSettings.setCacheMode(WebSettings.LOAD_DEFAULT);
////        if (isNetworkConnected(this)) {
////            //有网络网络加载
////            webSettings.setCacheMode(WebSettings.LOAD_DEFAULT);
////        } else {
////            //无网时本地缓存加载
////            webSettings.setCacheMode(WebSettings.LOAD_CACHE_ONLY);
////        }
//        webView.loadUrl("http://www.chaiwensong.top");
//        //webView.loadUrl("http://www.baidu.com");
//        // webView.loadUrl("file:///android_asset/index.html");
//        /**
//         * LOAD_CACHE_ONLY: 不使用网络，只读取本地缓存数据
//         * LOAD_DEFAULT: （默认）根据cache-control决定是否从网络上取数据。
//         * LOAD_NO_CACHE: 不使用缓存，只从网络获取数据.
//         * LOAD_CACHE_ELSE_NETWORK，只要本地有，无论是否过期，或者no-cache，都使用缓存中的数据。
//         */
//
//
//
//
//
//    }
//
////
////    public static boolean isNetworkConnected(Context context) {
////        if (context != null) {
////            ConnectivityManager mConnectivityManager = (ConnectivityManager) context
////                    .getSystemService(Context.CONNECTIVITY_SERVICE);
////            NetworkInfo mNetworkInfo = mConnectivityManager.getActiveNetworkInfo();
////            if (mNetworkInfo != null) {
////                return true;
////                //return mNetworkInfo.isAvailable();
////            }
////        }
////        return false;
////    }
//
//private void hideSystemUI() {
//    // Enables regular immersive mode.
//    // For "lean back" mode, remove SYSTEM_UI_FLAG_IMMERSIVE.
//    // Or for "sticky immersive," replace it with SYSTEM_UI_FLAG_IMMERSIVE_STICKY
//    View decorView = getWindow().getDecorView();
//    decorView.setSystemUiVisibility(
//            View.SYSTEM_UI_FLAG_IMMERSIVE
//                    // Set the content to appear under the system bars so that the
//                    // content doesn't resize when the system bars hide and show.
//                    | View.SYSTEM_UI_FLAG_LAYOUT_STABLE
//                    | View.SYSTEM_UI_FLAG_LAYOUT_HIDE_NAVIGATION
//                    | View.SYSTEM_UI_FLAG_LAYOUT_FULLSCREEN
//                    // Hide the nav bar and status bar
//                    | View.SYSTEM_UI_FLAG_HIDE_NAVIGATION
//                    | View.SYSTEM_UI_FLAG_FULLSCREEN);
//}
//
    private WebView webView;
    private ValueCallback<Uri> uploadFile;
    private ValueCallback<Uri[]> uploadFiles;

    @SuppressLint("SetJavaScriptEnabled")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

//        hideSystemUI();

        webView = findViewById(R.id.web_view);
        WebView webView = findViewById(R.id.web_view);
        webView.requestFocusFromTouch();
        WebSettings webSettings=webView.getSettings();
        webSettings.setJavaScriptEnabled(true);   //支持js
        webSettings.setAllowFileAccess(true);     //设置可以访问文件
        webSettings.setBlockNetworkImage(false);
        webSettings.setLoadWithOverviewMode(false);
        webSettings.setDomStorageEnabled(true);
        webSettings.setAppCacheMaxSize(1024 * 1024 * 80);
        //设置缓存路径
        String appCacheDir;
        appCacheDir = "com.example.mini_tiktok/cache";
        File fileSD = new File(appCacheDir);
        if (!fileSD.exists()) {
            fileSD.mkdir();
        }
        webSettings.setAppCachePath(appCacheDir);
        webSettings.setAllowContentAccess(true);
        webSettings.setAppCacheEnabled(true);
        webSettings.setCacheMode(WebSettings.LOAD_DEFAULT);
        webSettings.setMixedContentMode(WebSettings.MIXED_CONTENT_ALWAYS_ALLOW);

        //打开网页自动播放视
//        webSettings.setMediaPlaybackRequiresUserGesture(false);

        webView.setWebViewClient(new WebViewClient() {
            @Override
            public boolean shouldOverrideUrlLoading(WebView view, String url) {
                return false;
            }
        });


        webView.setWebChromeClient(new WebChromeClient() {

            @Override
            public Bitmap getDefaultVideoPoster() {
                return Bitmap.createBitmap(1, 1, Bitmap.Config.ARGB_8888);
            }

            // For Android 3.0+
            public void openFileChooser(ValueCallback<Uri> uploadMsg, String acceptType) {
                Log.i("test", "openFileChooser 1");
                uploadFile = uploadFile;
                openFileChooseProcess();
            }

            // For Android < 3.0
            public void openFileChooser(ValueCallback<Uri> uploadMsgs) {
                Log.i("test", "openFileChooser 2");
                uploadFile = uploadFile;
                openFileChooseProcess();
            }

            // For Android  > 4.1.1
            public void openFileChooser(ValueCallback<Uri> uploadMsg, String acceptType, String capture) {
                Log.i("test", "openFileChooser 3");
                uploadFile = uploadFile;
                openFileChooseProcess();
            }

            // For Android  >= 5.0
            public boolean onShowFileChooser(WebView webView,
                                             ValueCallback<Uri[]> filePathCallback,
                                             WebChromeClient.FileChooserParams fileChooserParams) {
                Log.i("test", "openFileChooser 4:" + filePathCallback.toString());
                uploadFiles = filePathCallback;
                openFileChooseProcess();
                return true;
            }
        });

        webView.loadUrl("http://www.chaiwensong.top");

    }

    private void openFileChooseProcess() {
        Intent i = new Intent(Intent.ACTION_GET_CONTENT);
        i.addCategory(Intent.CATEGORY_OPENABLE);
        i.setType("*/*");
        startActivityForResult(Intent.createChooser(i, "选择文件"), 0);
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if (resultCode == RESULT_OK) {
            switch (requestCode) {
                case 0:
                    if (uploadFile != null) {
                        Uri result = data == null || resultCode != RESULT_OK ? null
                                : data.getData();
                        uploadFile.onReceiveValue(result);
                        uploadFile = null;
                    }
                    if (uploadFiles != null) {
                        Uri result = data == null || resultCode != RESULT_OK ? null
                                : data.getData();
                        uploadFiles.onReceiveValue(new Uri[]{result});
                        uploadFiles = null;
                    }
                    break;
                default:
                    break;
            }
        } else if (resultCode == RESULT_CANCELED) {
            if (uploadFile != null) {
                uploadFile.onReceiveValue(null);
                uploadFile = null;
            }
            if (uploadFiles != null) {
                uploadFiles.onReceiveValue(null);
                uploadFiles = null;
            }
        }
    }



    @Override
    protected void onResume() {
        super.onResume();
        webView.onResume();
    }

    @Override
    protected void onPause() {
        super.onPause();
        webView.onPause();
    }

    /**
     * 确保注销配置能够被释放
     */
    @Override
    protected void onDestroy() {
        if (webView != null) {
            webView.destroy();
        }
        super.onDestroy();
    }

private void hideSystemUI() {
    // Enables regular immersive mode.
    // For "lean back" mode, remove SYSTEM_UI_FLAG_IMMERSIVE.
    // Or for "sticky immersive," replace it with SYSTEM_UI_FLAG_IMMERSIVE_STICKY
    View decorView = getWindow().getDecorView();
    decorView.setSystemUiVisibility(
            View.SYSTEM_UI_FLAG_IMMERSIVE
                    // Set the content to appear under the system bars so that the
                    // content doesn't resize when the system bars hide and show.
                    | View.SYSTEM_UI_FLAG_LAYOUT_STABLE
                    | View.SYSTEM_UI_FLAG_LAYOUT_HIDE_NAVIGATION
                    | View.SYSTEM_UI_FLAG_LAYOUT_FULLSCREEN
                    // Hide the nav bar and status bar
                    | View.SYSTEM_UI_FLAG_HIDE_NAVIGATION
                    | View.SYSTEM_UI_FLAG_FULLSCREEN);
}


}

