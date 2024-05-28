<!-- UNCOMPLETED -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age Calculator!</title>
    <link rel="icon" type="image/png" sizes="32x32" href="./age-calculator-app-main/assets/images/favicon-32x32.png" >
    <link rel="stylesheet" href="styling.css">
    <script src="javascript.js"></script>
</head>
<body>
    <?php 
        $var1 = $_GET["year"];
        $var2 = $_GET["month"];
        $var3 = $_GET["day"];
        $currentYear = date('Y');
        $currentMonth = date('n');
        $currentDay = date('d');
        $err = "- -";
        $valDay = "stuff";
        $valMon = "stuff";
        $valYr = "stuff";
    ?>

    <main>
        <p id="hbd"><?php 
            if ($var2 == $currentMonth and $var3 == $currentDay) {
                echo "HAPPY BIRTHDAY!";
            }

        ?></p>
        <section id="container">
            <article id="form_cont">
                <form method="get" id="form" action="index.php">
                    <div id="da">
                        <label for="day" id="dayLab">DAY</label><br>                
                        <input name="day" type="text" id="day" class="input" placeholder="DD" required>
                        <span class="err_lab">This is a required field.</span>
                        <span class="err_lab2">Must be a valid day.</span>
                    </div>
                    <div id="mont">
                        <label for="month" id="monLab">MONTH</label><br>
                        <input name="month" type="text" id="month" class="input" placeholder="MM" required>
                        <span class="err_lab">This is a required field.</span>
                        <span class="err_lab2">Must be a valid month.</span>
                    </div>
                    <div id="yea">
                        <label for="year" id="yrLab">YEAR</label><br>
                        <input name="year" type="text" id="year"  class="input" placeholder="YYYY" required>
                        <span class="err_lab">This is a required field.</span>
                        <span class="err_lab2">Must be in the past.</span>
                    </div>
                </form>
                <div id="button_cont">
                    <hr>
                    <div id="button" onclick="func()">
                        <img src="./age-calculator-app-main/assets/images/icon-arrow.svg" alt="not_found">
                    </div>
                </div>
            </article>

            <article id="actual_res">
                <p><span class="inp" id="years">
                    <?php 
                        if ($var1 == null or $var2 == null or $var3 == null) {
                            echo $err;
                        } elseif ($var1 > $currentYear) {
                            echo $err;
                            $valYr = "err";
                        } elseif ($var1 >= $currentYear and $var2 >= $currentMonth) {
                            echo $err;
                        } elseif ($var2 > 12 or $var3 > 31 or $var1 > $currentYear) {
                            echo $err;
                        } elseif ($var2 >= $currentMonth) {
                            if ($var3 <= $currentDay and $var2 == $currentMonth) {
                                $birthYear = ($currentYear - $var1);
                            } else {
                                $birthYear = ($currentYear - $var1) - 1;
                            }
                            echo $birthYear;
                        } else {
                            $birthYear = $currentYear - $var1;
                            echo $birthYear;
                        }                  
                    ?>
                </span> years</p>
                <p><span class="inp" id="months">
                <?php 
                    if ($var1 == null or $var2 == null or $var3 == null) {
                        echo $err;
                    } elseif ($var2 > 12) {
                        echo $err;
                        $valMon = "err";
                    } elseif ($var1 >= $currentYear and $var2 >= $currentMonth) {
                        echo $err;
                    } elseif ($var2 > 12 or $var3 > 31 or $var1 > $currentYear) {
                        echo $err;
                    } elseif ($var2 > $currentMonth) {
                        if ($var3 > $currentDay) {
                            $birthMonth = $currentMonth + (11 - $var2);
                        } else {
                            $birthMonth = $currentMonth + (12 - $var2);
                        }
                        echo $birthMonth;
                    } elseif ($var2 == $currentMonth and $var3 > $currentDay) {
                        $birthMonth = $currentMonth + (12 - $var2) - 1;
                        echo $birthMonth;
                    } else {
                        if ($currentDay < $var3 and ($currentMonth - $var2) == 1) {
                            $birthMonth = 0;
                        } elseif ($currentDay < $var3) {
                            $birthMonth = $currentMonth - $var2 - 1;
                        } else {
                            $birthMonth = $currentMonth - $var2;
                        }
                        echo $birthMonth;
                    }
                ?>
                </span> months</p>
                <p><span class="inp" id="days">
                <?php
                    if ($var1 == "" or $var2 == "" or $var3 == "") {
                        echo $err;
                    } elseif ($var3 > 31) {
                        echo $err;
                        $valDay = "err";
                    } elseif ($var1 >= $currentYear and $var2 >= $currentMonth and $var3 >= $currentDay) {
                        echo $err;
                    } elseif ($var2 > 12 or $var3 > 31 or $var1 > $currentYear) {
                        echo $err;
                    } else {
                        if ($var3 <= $currentDay) {
                            $days1 = $currentDay - $var3;
                            echo $days1;
                        } elseif ($var3 > $currentDay) {

                            $currentMonth--;
                            if ($currentMonth == 1 or $currentMonth == 3 or $currentMonth == 5 or $currentMonth == 7 or
                            $currentMonth == 8 or $currentMonth == 10 or $currentMonth == 12) {
                                $no_of_days_m = 31;
                            } elseif ($currentMonth == 2) {
                                $no_of_days_m = 28;
                            } else {
                                $no_of_days_m = 30;
                            }

                            if ($no_of_days_m == 31) {
                                $days1 = $currentDay + (31 - $var3);
                                echo $days1;
                            } elseif ($no_of_days_m == 30) {
                                $days1 = $currentDay + (30 - $var3);
                                echo $days1;
                            } elseif ($no_of_days_m == 28) {
                                $days1 = $currentDay + (28 - $var3);
                                echo $days1;
                            } 
                        } 
                    }
                ?>
                </span> days</p>
            </article>
        </section>
       
    </main>
</body>
</html>