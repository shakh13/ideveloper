<?php
/**
 * Created by PhpStorm.
 * User: shaxzod
 * Date: 08.10.18
 * Time: 0:01
 */
    $this->title = "Оформить заказ";
?>

<form action="" method="post">
                        <div class="row">
                            <div class="col s12 m8 offset-m2">
                                <ul class="mbreadcrumb">
                                    <li>
                                        <a href="profile.html">Профиль</a>
                                    </li>
                                    <li>
                                        <a href="order.html">Опубликовать проект</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col s12 m8 offset-m2 input-field">
                                <input type="text" name="title" id="title" required>
                                <label for="title">Название проекта</label>
                            </div>
                            <div class="col s12 m8 offset-m2 input-field">
                                <input type="text" name="description" id="description" required>
                                <label for="description">Краткое описание</label>
                            </div>
                            <div class="col s12 m8 offset-m2 input-field">
                                <textarea name="content" id="content" class="materialize-textarea" required></textarea>
                                <label for="content">Описание</label>
                            </div>
                            <div class="col s5 m3 offset-m2 input-field">
                                <input type="number" name="price" id="price" min="20" required>
                                <label for="price">Цена</label>
                            </div>
                            <div class="col s3 m3 input-field">
                                <select name="currency" id="currency">
                                    <option value="$">USD</option>
                                    <option value="SUM">UZS</option>
                                </select>
                            </div>
                            <div class="col s4 m2 input-field">
                                <input type="number" name="pay_percent" id="pay_percent" value="100" min="40" max="100" required>
                                <label for="pay_percent">Передоплата %</label>

                            </div>
                            <div class="col s12 m8 offset-m2 input-field file-field">
                                <div class="btn">
                                    <span>ТЗ</span>
                                    <input type="file" name="tz" id="tz" required>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" required>
                                </div>
                            </div>
                            <div class="col s7 m5 offset-m2 input-field">
                                <select name="catalogue" id="catalogue">
                                    <option value="" disabled selected>Специализация</option>
                                    <option value="0">Программирование</option>
                                </select>
                            </div>
                            <div class="col s5 m3 input-field">
                                <input type="text" class="datepicker" id="deadline" name="deadline" required>
                                <label for="deadline">Срок до</label>
                            </div>
                            <div class="col s12 m4 offset-m4"><button type="submit" class="btn w100">К оплату</button></div>
                        </div>
                    </form>