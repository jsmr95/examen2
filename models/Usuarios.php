<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $id
 * @property string $nombre
 * @property string $password
 *
 * @property Reservas[] $reservas
 */
class Usuarios extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'password'], 'required'],
            [['nombre', 'password'], 'string', 'max' => 255],
            [['nombre'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'password' => 'Contraseña',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reservas::className(), ['usuario_id' => 'id'])->inverseOf('usuario');
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @param null|mixed $type
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
    }
    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
    }
    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
    }
    /**
     * Validates password.
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
}
