<?php

// *******************************************************************************
// DATE and TIME functions
// *******************************************************************************
$thai_day_arr=array("0"=>"อาทิตย์","1"=>"จันทร์","2"=>"อังคาร","3"=>"พุธ","4"=>"พฤหัสบดี","5"=>"ศุกร์","6"=>"เสาร์");   
$thai_month_arr=array(   
    "0"=>"",   
    "1"=>"มกราคม",   
    "2"=>"กุมภาพันธ์",   
    "3"=>"มีนาคม",   
    "4"=>"เมษายน",   
    "5"=>"พฤษภาคม",   
    "6"=>"มิถุนายน",    
    "7"=>"กรกฎาคม",   
    "8"=>"สิงหาคม",   
    "9"=>"กันยายน",   
    "10"=>"ตุลาคม",   
    "11"=>"พฤศจิกายน",   
    "12"=>"ธันวาคม"                    
);   
$thai_month_arr_short=array(   
    "0"=>"",   
    "1"=>"ม.ค.",   
    "2"=>"ก.พ.",   
    "3"=>"มี.ค.",   
    "4"=>"เม.ย.",   
    "5"=>"พ.ค.",   
    "6"=>"มิ.ย.",    
    "7"=>"ก.ค.",   
    "8"=>"ส.ค.",   
    "9"=>"ก.ย.",   
    "10"=>"ต.ค.",   
    "11"=>"พ.ย.",   
    "12"=>"ธ.ค."                    
);   

function ThDate($d)
{
//วันภาษาไทย
$ThDay = array ( "อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์" );
//เดือนภาษาไทย
$ThMonth = array ( "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน","พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม","กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม" );

//กำหนดคุณสมบัติ
$week = date("w", strtotime($d));
$months = date( "m",strtotime($d) )-1; // ค่าเดือน (1-12)
$day = date( "d",strtotime($d) ); // ค่าวันที่(1-31)
$years = date( "Y",strtotime($d))+543; // ค่า ค.ศ.บวก 543 ทำให้เป็น ค.ศ.
$h = date( "H",strtotime($d));
$i = date( "i",strtotime($d));

	return $h.":".$i."&nbsp;&nbsp;วัน".$ThDay[$week]."&nbsp;ที่&nbsp;".$day."&nbsp;".$ThMonth[$months]."&nbsp;&nbsp;".$years;
}



function thai_date_and_time($time){   // 19 ธันวาคม 2556 เวลา 10:10:43
	global $thai_day_arr,$thai_month_arr;   
    $thai_date_return= date("j", strtotime($time));
    $thai_date_return.=" ".$thai_month_arr[date("n",strtotime($time))];   
    $thai_date_return.= " ".(date("Y",strtotime($time))+543);   
    $thai_date_return.= " เวลา ".date("H:i:s",strtotime($time));
    return $thai_date_return;   
 
} 

function Now()
	{
	$now = date("Y-m-d H:i:s");
	return $now;
	}

function DateFormat($date)
	{
	$date_format = "M d, Y";

	if($date=='0000-00-00')
		return "-";
	else
		{			
	    date_default_timezone_set('Europe/London');
		$datetime = date_create($date);
		return $datetime->format($date_format);		
		}
	}


function DateTimeFormat($date)
	{
	$date_format = "M d, Y";
	if($date=='0000-00-00 00:00:00')
		return "-";
	else
		{		
        date_default_timezone_set('Asia/Bangkok');
		$datetime = date_create($date);
		return $datetime->format($date_format.', H:i');		
		}
	}


function TimeFormat($date)
	{
    date_default_timezone_set('Asia/Bangkok');
	$datetime = date_create($date);
	return $datetime->format('H:i');		
	}
	

function xDaysAgo($days)
{
	return date("Y-m-d", strtotime("-$days day"));	
}











