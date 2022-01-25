<?php


if (!function_exists('getConstant')) {

    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    function getConstant($key, $default = null)
    {
        return config('constant.' . $key, $default);
    }
}

if (!function_exists('getSystemConfig')) {

    /**
     * @param $key
     * @param null $default
     * @param $flip
     * @return mixed
     */
    function getSystemConfig($key, $default = null, $flip = false)
    {
        return config('system.' . $key, $default);
    }
}

if (!function_exists('getCreatedAtColumn')) {

    function getCreatedAtColumn($key = 'field')
    {
        return getSystemConfig('created_at_column.' . $key);
    }
}

if (!function_exists('getUpdatedAtColumn')) {
    function getUpdatedAtColumn($key = 'field')
    {
        return getSystemConfig('updated_at_column.' . $key);
    }
}

if (!function_exists('getDeletedAtColumn')) {

    function getDeletedAtColumn($key = 'field')
    {
        return getSystemConfig('deleted_at_column.' . $key, '');
    }
}

if (!function_exists('getDelFlagColumn')) {

    function getDelFlagColumn($key = 'field')
    {
        return getSystemConfig('del_flag_column.' . $key);
    }
}

if (!function_exists('getCreatedByColumn')) {

    function getCreatedByColumn($key = 'field')
    {
        return getSystemConfig('created_by_column.' . $key);
    }
}

if (!function_exists('getUpdatedByColumn')) {

    function getUpdatedByColumn($key = 'field')
    {
        return getSystemConfig('updated_by_column.' . $key);
    }
}

if (!function_exists('getDeletedByColumn')) {

    function getDeletedByColumn($key = 'field')
    {
        return getSystemConfig('deleted_by_column.' . $key, getUpdatedByColumn());
    }
}