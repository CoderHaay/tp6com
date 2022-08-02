<?php

namespace app\validate;

use app\lib\exception\ParameterException;
use think\Validate;

class BaseValidate extends Validate
{

    /**
     * @throws ParameterException
     */
    public function getDataByRule($arrays): array
    {
        $currentScene = $this->currentScene;
        $scene = $this->scene;

        if (!array_key_exists($currentScene, $scene)){
            throw new ParameterException(['msg' => '校验scene值不存在']);
        }
        $rules = $scene[$currentScene];
        $newArray = [];
        foreach ($rules as $rule) {
            $newArray[$rule] = $arrays[$rule];
        }

        return $newArray;
    }

    protected function canBeEmpty($value, $rule = '', $data = '', $field = '')
    {
        return true;
    }
}