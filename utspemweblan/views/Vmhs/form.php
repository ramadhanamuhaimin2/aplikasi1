<?php
class Form
{
    var $fields = array();
    var $action;
    var $submit = "";
    var $input = "";
    var $jumField = 0;
    var $type;
    var $cols;
    var $rows;

    function __construct($action, $input)
    {
        $this->action = $action;
        $this->input = $input;
    }

    

    function displayForm()
    {

        echo "<form action='" . $this->action . "' method='post'>";
        echo "<table widht='100%'>";
?>
        <div class="container mt-5">
            <?php
            for ($i = 0; $i < $this->jumField; $i++) {
                if ($this->fields[$i]['type'] == "text") { ?>
                    <div class="form-group col-sm-10">
                        <label for="exampleInputEmail1"><?= $this->fields[$i]['label'] ?></label>
                        <input type="text" name="<?= $this->fields[$i]['name'] ?>" class="form-control" id="<?= $this->fields[$i]['name'] ?>" aria-describedby="emailHelp">
                        
                    </div><?php
                        } elseif ($this->fields[$i]['type'] == "password") { ?>
                    <div class="form-group col-sm-10">
                        <label for="exampleInputEmail1"><?= $this->fields[$i]['label'] ?></label>
                        <input type="password" name="<?= $this->fields[$i]['name'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div><?php
                        } elseif ($this->fields[$i]['type'] == "radio") { ?>
                    <div class="form-check ml-3">
                        <input class="form-check-input" type="radio" name="<?= $this->fields[$i]['name'] ?>" value="<?= $this->fields[$i]['label'] ?>">
                        <label class="form-check-label" for="exampleRadios1">
                            <?= $this->fields[$i]['label'] ?>
                        </label>
                    </div>
                <?php
                        } elseif ($this->fields[$i]['type'] == "checkbox") { ?>
                    <div class="form-check ml-3">
                        <input class="form-check-input" type="checkbox" name="<?= $this->fields[$i]['name'] ?>" value="<?= $this->fields[$i]['label'] ?>">
                        <label class="form-check-label" for="defaultCheck1">
                            <?= $this->fields[$i]['label'] ?>
                        </label>
                    </div></br>
                <?php 
                        } elseif ($this->fields[$i]['type'] == "select") { ?>
                    <div class="form-group col-sm-10">
                        <label><?= $this->fields[$i]['label'] ?></label>
                        <select class="form-control" name="<?= $this->fields[$i]['name'] ?>">
                            <?php foreach ($this->fields[$i]['value'] as $value) { ?>
                                <option value="<?= $value[$this->fields[$i]['name']] ?>"><?= $value[$this->fields[$i]['name']] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div><?php
                        } elseif ($this->fields[$i]['type'] == "textarea") { ?>
                    <div class="form-group col-sm-10">
                        <label><?= $this->fields[$i]['label'] ?></label>
                        <textarea class="form-control" name="<?= $this->fields[$i]['name'] ?>" cols="<?= $this->cols ?>" rows="<?= $this->rows ?>"></textarea>
                        
                    </div>
            <?php
                        }
                        elseif ($this->fields[$i]['type'] == "date") { ?>
                            <div class="form-group col-sm-10">
                                <label for="exampleInputEmail1"><?= $this->fields[$i]['label'] ?></label>
                                <input type="date" name="<?= $this->fields[$i]['name'] ?>" class="form-control" id="exampleInputEmail1">
                            </div><?php
                                }
                      
                    } ?>

            <!-- <button type="submit" class="btn btn-primary mb-2" name="tombol" value="<?= $this->submit ?>"><?= $this->submit ?></button> -->
            <button type="submit" class="btn btn-primary mb-2" name="tombol2" value="<?= $this->input ?>"><?= $this->input ?></button>
        </div>
    <?php
        echo "</table>";
    }

    function date($name, $label, $type="date")
    {
        $this->fields[$this->jumField]['name'] = $name;
        $this->fields[$this->jumField]['label'] = $label;
        $this->fields[$this->jumField]['type'] = $type;
        $this->jumField++;
    }

    function text($name, $label, $type = "text")
    {
        $this->fields[$this->jumField]['name'] = $name;
        $this->fields[$this->jumField]['label'] = $label;
        $this->fields[$this->jumField]['type'] = $type;
        $this->fields[$this->jumField]['id'] = $name;
        $this->jumField++;
    }
    function password($name, $label, $type = "password")
    {
        $this->fields[$this->jumField]['name'] = $name;
        $this->fields[$this->jumField]['label'] = $label;
        $this->fields[$this->jumField]['type'] = $type;
        $this->jumField++;
    }
    function radio($name, $label, $type = "radio")
    {
        $this->type = "radio";
        $this->fields[$this->jumField]['name'] = $name;
        $this->fields[$this->jumField]['label'] = $label;
        $this->fields[$this->jumField]['type'] = $type;
        $this->jumField++;
    }
    function checkbox($name, $label, $type = "checkbox")
    {
        $this->type = "checkbox";
        $this->fields[$this->jumField]['name'] = $name;
        $this->fields[$this->jumField]['label'] = $label;
        $this->fields[$this->jumField]['type'] = $type;
        $this->jumField++;
    }
    function select($name, $label, $value = array(), $type = "select")
    {
        $this->type = "select";
        $this->fields[$this->jumField]['name'] = $name;
        $this->fields[$this->jumField]['label'] = $label;
        $this->fields[$this->jumField]['type'] = $type;
        $this->fields[$this->jumField]['value'] = $value;
        $this->jumField++;
    }
    function textarea($name, $label, $cols, $rows, $type = "textarea")
    {
        $this->type = "checkbox";
        $this->cols = $cols;
        $this->rows = $rows;
        $this->fields[$this->jumField]['name'] = $name;
        $this->fields[$this->jumField]['label'] = $label;
        $this->fields[$this->jumField]['type'] = $type;
        $this->jumField++;
    }
    function getForm()
    {

        for ($i = 0; $i < $this->jumField; $i++) 
        {
            $this->fields[$i]['value'] = $_POST[$this->fields[$i]['name']];
        }
    }
    function cetakForm()
    {
    ?>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4"></h1>
                <p class="lead"><?php
                                for ($i = 0; $i < $this->jumField; $i++) {
                                    echo "" . $this->fields[$i]['label'] . " : " . $this->fields[$i]['value'] . "</br>";
                                } ?>
                </p>
            </div>
        </div><?php

            }
        }
