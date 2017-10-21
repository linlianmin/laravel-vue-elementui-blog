<?php
namespace App\Repositories\Frontend;

use App\Models\Dict;

class DictRepository extends BaseRepository
{

    /**
     * 根据 text_en Arr 获取对应内容
     * @param  Array $code_arr [text_en]
     * @return Array [text_en => value]
     */
    public function getDictListsByTextEnArr($text_en_arr)
    {
        $dictLists = Dict::whereIn('text_en', $text_en_arr)->where('status', 1)->get();
        if (count($text_en_arr) !== count($dictLists)) {
            echo '参数错误，请联系管理员';
            exit();
        }
        foreach ($dictLists as $key => $item) {
            $resultData[$item->text_en] = $item->value;
        }
        return $resultData;
    }
}