<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function get_day_options()
{
    $day_options = array('' => 'วัน');
    for ($d = 1; $d <= 31; $d++) {
        $day_options[$d] = $d;
    }
    return $day_options;
}

function get_month_options()
{
    return array(
        ''  => 'เดือน',
        '1' => 'มกราคม',
        '2' => 'กุมภาพันธ์',
        '3' => 'มีนาคม',
        '4' => 'เมษายน',
        '5' => 'พฤษภาคม',
        '6' => 'มิถุนายน',
        '7' => 'กรกฎาคม',
        '8' => 'สิงหาคม',
        '9' => 'กันยายน',
        '10'=> 'ตุลาคม',
        '11'=> 'พฤศจิกายน',
        '12'=> 'ธันวาคม',
    );
}

function get_year_options($start_year = 1980)
{
    $year_options = array('' => 'ปี');
    $year_end = date('Y');

    for ($y = $year_end; $y >= $start_year; $y--) {
        $year_options[$y] = $y + 543; // แสดงเป็น พ.ศ.
    }
    return $year_options;
}
