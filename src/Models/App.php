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

/**
 * 应用模型
 * Class App
 * @package JoseChan\App\DataSet\Models
 * @property int $id
 * @property string $name
 * @property string $app_secret
 * @property string $created_at
 * @property string $updated_at
 * @property int $status
 */
class App extends Model
{
    /**
     * 设置采用的集合类
     * @param array $models
     * @return \Illuminate\Database\Eloquent\Collection|AppCollection
     */
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