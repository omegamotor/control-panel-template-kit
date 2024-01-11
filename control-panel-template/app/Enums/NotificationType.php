<?php

namespace App\Enums;

enum NotificationType: string
{
    case SUCCESS = "SUCCESS";
    case INFO = "INFO";
    case WARNING = "WARNING";
    case DANGER = "DANGER";
    case ERROR = "ERROR";
}
