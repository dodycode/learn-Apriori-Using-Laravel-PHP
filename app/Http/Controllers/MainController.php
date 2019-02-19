<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function main() {
        // echo "<h1>Test doang</h1>";

        $transaksiPembelian = [
            0 => "Pena,Roti,Mentega",
            1 => "Roti,Mentega,Telur,Susu",
            2 => "Buncis,Telur,Susu",
            3 => "Roti,Mentega",
            4 => "Roti,Mentega,Telur,Susu"
        ];

        //pisahkan item
        $items = array();
        $i = 0;

        foreach ($transaksiPembelian as $key => $value) {
            $values = explode(",", $value);
            foreach ($values as $value) {
                if(!in_array($value, $items)){
                    $items[$i] = $value;
                    $i++;
                }
            }
        }

        //mencari total transaksi per item
        foreach ($items as $item) {
            $total_per_item[$item] = 0;
            foreach ($transaksiPembelian as $key => $value) {
                if (strpos($value, $item)) {
                    $total_per_item[$item]++;
                }
            }
        }


        // F1
        $f1 = array_filter($total_per_item, function($var) {
            return ($var < 1 === false);
        });

        $itemsF1 = array_keys($f1);

        for ($item1=0; $item1 < count($itemsF1) - 1; $item1++) { 
            for ($item2=$item1 + 1; $item2 < count($itemsF1); $item2++) { 
                $total_per_item_f2[$itemsF1[$item1].','.$itemsF1[$item2]] = 0; //nilai default

                foreach ($transaksiPembelian as $key => $value) {
                    if((strpos($value, $itemsF1[$item1])) && (strpos($value, $itemsF1[$item2]))) {
                        $total_per_item_f2[$itemsF1[$item1].','.$itemsF1[$item2]]++;
                    }
                }
            }
        }

        // F2
        $f2 = array_filter($total_per_item_f2, function($var) {
            return ($var < 1 === false);
        });

        // F2 + F1 - Gabungan
        $itemsF2 = array_keys($f2);
        $same = false;
        foreach ($itemsF1 as $key => $value) {
            $k1 = explode(',', $itemsF2[0]);

            if (!in_array($value, $k1)) {
                $f3[$itemsF2[0].','.$value] = 0;
            }
        }

        foreach ($f3 as $key => $value) {
            foreach ($transaksiPembelian as $transaksiKey => $transaksiValue) {
                if(strpos($transaksiValue, $key)) {
                    $f3[$key]++;
                }
            }
        }


        //find SS-S
        foreach ($itemsF2 as $key => $value) {
            $currentValue = explode(',', $value);
            $fk[$value] = [
                $currentValue[0].','.$currentValue[1] => $currentValue[0].' then buy '.$currentValue[1],
                $currentValue[1].','.$currentValue[0] => $currentValue[1].' then buy '.$currentValue[0]
            ];
        }

        
        $jumlahTransaksi = count($transaksiPembelian);

        foreach ($fk as $fkKey => $fkValue) {
            foreach ($fkValue as $key => $value) {
                $jumlahItemSekaligus = 0;
                $jumlahTransaksiPadaBagianAntecedent = 0;
                $currentAntecedent = explode(',', $key);
                //default support and confidence
                $ssS[$value] = [
                    "support" => 0,
                    "confidence" => 0
                ];

                foreach ($transaksiPembelian as $transaksiKey => $transaksiValue) {
                    if (strpos($transaksiValue, $key)) {
                        $jumlahItemSekaligus++;
                    }

                    if (strpos($transaksiValue, $currentAntecedent[0])) {
                        $jumlahTransaksiPadaBagianAntecedent++;
                    }
                }

                $ssS[$value] = [
                    "support" => $jumlahItemSekaligus/$jumlahTransaksi*100,
                    "confidence" => $jumlahItemSekaligus/$jumlahTransaksiPadaBagianAntecedent*100
                ];                
            }
        }

        $iterationHeadingOneTableOne = 1;
        $iterationHeadingOneTableTwo = 1;

        $iterationHeadingTwoTableOne = 1;
        $iterationHeadingTwoTableTwo = 1;

        $iterationHeadingThreeTableOne = 1;

        return view('main')
        ->with('transaksiPembelian', $transaksiPembelian)
        ->with('totalPerItem', $total_per_item)
        ->with('totalPerItemF2', $total_per_item_f2)
        ->with('f1', $f1)
        ->with('f2', $f2)
        ->with('f3', $f3)
        ->with('ssS', $ssS)
        ->with('iterationHeadingOneTableOne', $iterationHeadingOneTableOne)
        ->with('iterationHeadingOneTableTwo', $iterationHeadingOneTableTwo)
        ->with('iterationHeadingTwoTableOne', $iterationHeadingTwoTableOne)
        ->with('iterationHeadingTwoTableTwo', $iterationHeadingTwoTableTwo)
        ->with('iterationHeadingThreeTableOne', $iterationHeadingThreeTableOne);
    }
}
