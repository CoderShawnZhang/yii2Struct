<?php

/**
 * 错误处理
 */
namespace app\Service\Menu\Exception;
use yii\base\Exception;

class MenuException extends Exception
{
    const CODE = 0;

    public function __construct($message = null, $code = 0)
    {
        parent::__construct($message, static::CODE);
    }

    const MENU_CODE_STATE_OPEN = 1001;
    const MENU_CODE_STATE_CLOSE = 1002;
    const MENU_CODE_LOCK_OPEN = 1003;
    const MENU_CODE_LOCK_CLOSE = 1004;
    const MENU_CODE_OPTION_ERROR = 1005;

    /**删除提示*/
    const MENU_CODE_DEL_SUCCESS = 1006;
    const MENU_CODE_DEL_FAIL = 1007;

    const MENU_MSG_STATE_OPEN = '状态已开启';
    const MENU_MSG_STATE_CLOSE = '状态已关闭';
    const MENU_MSG_LOCK_OPEN = '锁定已开启';
    const MENU_MSG_LOCK_CLOSE = '锁定已关闭';
    const MENU_MSG_OPTION_ERROR = '操作失败';

    /**删除提示*/
    const MENU_MSG_DEL_SUCCESS = '删除成功';
    const MENU_MSG_DEL_FAIL = '删除失败';
}