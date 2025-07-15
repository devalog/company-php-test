<?php

namespace Devin\Core\Client;

enum HttpMethod
{
    case GET;
    case POST;
    case PUT;
    case PATCH;
    case DELETE;
}
