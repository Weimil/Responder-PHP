<?php

namespace Responder\Http;

enum HttpMethod: string
{
    case GET = 'GET';
    case PUT = "PUT";
    case POST = "POST";
    case PATCH = "PATCH";
    case DELETE = "DELETE";
}
