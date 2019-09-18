<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2019/1/1
 * Time: 11:11
 */

namespace JoseChan\App\DataSet\Models;


use Illuminate\Database\Eloquent\Model;
use JoseChan\App\DataSet\Collection\AppCollection;

class App extends Model
{
    public function newCollection(array $models = [])
    {
        return new AppCollection($models);
    }

    /**
     * 生成当前应用的token
     * @return bool|string
     */
    public function initToken()
    {
        if($this->exists)
        {
            return md5($this->id.$this->app_secret.time());
        }else{
            return false;
        }
    }
}