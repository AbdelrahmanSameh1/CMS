<?php

require "lib/helper.php";

session_start();

session_destroy();

helper::redirect("login");
