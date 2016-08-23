<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Admin]].
 *
 * @see Admin
 */
class AdminQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Admin[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Admin|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}