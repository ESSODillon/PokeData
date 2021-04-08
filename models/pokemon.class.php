<?php
/*
 * Author: Dillon Polley
 * Date: April 8th, 2021
 * Name: pokemon.class.php
 * Description: the Pokemon class models a virtual Pokemon creature
 */

class Pokemon
{

    private $id, $name, $hp, $attack, $defense, $type_1, $type_2, $ability_1, $ability_2, $hidden_ability, $mass, $color, $gender, $evolve, $description, $image;

    public function __construct($name, $hp, $attack, $defense, $type_1, $type_2, $ability_1, $ability_2, $hidden_ability, $mass, $color, $gender, $evolve, $description, $image)
    {
        $this->name = $name;
        $this->hp = $hp;
        $this->attack = $attack;
        $this->defense = $defense;
        $this->type_1 = $type_1;
        $this->type_2 = $type_2;
        $this->ability_1 = $ability_1;
        $this->ability_2 = $ability_2;
        $this->hidden_ability = $hidden_ability;
        $this->mass = $mass;
        $this->color = $color;
        $this->gender = $gender;
        $this->evolve = $evolve;
        $this->description = $description;
        $this->image = $image;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getHp()
    {
        return $this->hp;
    }

    public function getAttack()
    {
        return $this->attack;
    }

    public function getDefense()
    {
        return $this->defense;
    }

    public function getType1()
    {
        return $this->type_1;
    }

    public function getType2()
    {
        return $this->type_2;
    }

    public function getAbility1()
    {
        return $this->ability_1;
    }

    public function getAbility2()
    {
        return $this->ability_2;
    }

    public function getHiddenAbility()
    {
        return $this->hidden_ability;
    }

    public function getMass()
    {
        return $this->mass;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getEvolve()
    {
        return $this->evolve;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}
