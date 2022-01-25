<?php

namespace App\Database\Migration;

use Illuminate\Database\Schema\Blueprint;

class CustomBlueprint extends Blueprint
{
    public function bigIncrements($column)
    {
        return parent::bigIncrements($column)->unique(); // TODO: Change the autogenerated stub
    }

    public function increments($column)
    {
        return parent::increments($column)->unique(); // TODO: Change the autogenerated stub
    }

    public function timestamps($precision = 0)
    {
        $this->timestamp(getCreatedAtColumn(), $precision)->comment(getCreatedAtColumn('comment'))->useCurrent();

        switch (config('database.default')) {
            case 'pgsql':
                $this->timestamp(getUpdatedAtColumn(), $precision)->nullable()->comment(getUpdatedAtColumn('comment'))->useCurrent();
                break;
            default:
                $this->timestamp(getUpdatedAtColumn(), $precision)->default(getConstant('DEFAULT_UPDATE_DATE_TIME_VALID'))->nullable()->comment(getUpdatedAtColumn('comment'))->useCurrent();
                break;
        }
    }

    public function timestampsTz($precision = 0)
    {
        $this->timestampTz(getCreatedAtColumn(), $precision)->nullable()->comment(getCreatedAtColumn('comment'));

        $this->timestampTz(getUpdatedAtColumn(), $precision)->nullable()->comment(getUpdatedAtColumn('comment'));
    }

    /**
     * Add a "deleted at" timestamp for the table.
     *
     * @param  string $column
     * @return \Illuminate\Support\Fluent
     */
    public function softDeletes($column = '', $precision = 0)
    {
        $column = $column ? $column : getDeletedAtColumn();
        $column ? $this->timestamp($column, $precision)->comment(getDeletedAtColumn('comment'))->nullable() : null;
        return getDelFlagColumn() ? $this->char(getDelFlagColumn(), '1')->default(0)->comment(getDelFlagColumn('comment')) : null;
    }

    /**
     * Add a "deleted at" timestampTz for the table.
     *
     * @return \Illuminate\Support\Fluent
     */
    public function softDeletesTz($column = 'deleted_at', $precision = 0)
    {
        return getDeletedAtColumn() ? $this->timestampTz(getDeletedAtColumn(), $precision)->nullable()->comment(getDelFlagColumn('comment')) : null;
    }

    public function dropSoftDeletes($column = 'deleted_at')
    {
        getDeletedAtColumn() ? $this->dropColumn(getDeletedAtColumn()) : null;
        getDelFlagColumn() ? $this->dropColumn(getDelFlagColumn()) : null;
    }

    public function dropTimestamps()
    {
        getCreatedAtColumn() ? $this->dropColumn(getCreatedAtColumn()) : null;
        getUpdatedAtColumn() ? $this->dropColumn(getUpdatedAtColumn()) : null;
    }

    public function actionBy()
    {
        $deletedBy = getDeletedByColumn();
        $updatedBy = getUpdatedByColumn();
        getCreatedByColumn() ? $this->integer(getCreatedByColumn())->comment(getCreatedByColumn('comment')) : null;
        $updatedBy ? $this->integer($updatedBy)->nullable()->comment(getUpdatedByColumn('comment')) : null;
        $deletedBy && $deletedBy != $updatedBy ? $this->integer($deletedBy)->nullable()->comment(getDeletedByColumn('comment')) : null;
    }

    public function dropActionBy()
    {
        $deletedBy = getDeletedByColumn();
        $updatedBy = getUpdatedByColumn();

        getCreatedByColumn() ? $this->dropColumn(getCreatedByColumn()) : null;
        $updatedBy ? $this->dropColumn(getUpdatedByColumn()) : null;
        $deletedBy && $deletedBy != $updatedBy ? $this->dropColumn($deletedBy) : null;
    }

    public function status()
    {
        $this->tinyInteger('status')->default(0);
    }

    public function dropStatus()
    {
        $this->dropColumn('status');
    }
}