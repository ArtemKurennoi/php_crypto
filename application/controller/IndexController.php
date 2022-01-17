<?php

class IndexController extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Handles what happens when user moves to URL/index/index - or - as this is the default controller, also
     * when user moves to /index or enter your application at base level
     */
    public function index()
    {
        //апи
        $res = file_get_contents('https://min-api.cryptocompare.com/data/top/mktcapfull?limit=10&tsym=USD');
        //преобразуем json в php
        $decode=json_decode($res, TRUE)["Data"];
        //массив данных
        $data=[];
        foreach ($decode as $item)
        {
            //получаем нужные параметры (Название, Курс, Монета)
            $obj=[$item['CoinInfo']['Name'],
                $item['CoinInfo']['FullName'],
                $item['RAW']['USD']['PRICE']];
            //запись в массив
            array_push($data,$obj);
        }

        //сортировка по убыванию стоимости
        usort($data,function ($a,$b){
            return -strnatcmp($a[2],$b[2]);
        });
        //передача данных в представление
        $this->View->render('index/index',array(
            'data'=>$data
        ));

    }
}
