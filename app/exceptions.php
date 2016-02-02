<?php namespace L5Admin\Exceptions;

class AppException extends \Exception{};
class NotAuthorizedException extends \Exception{};

class PasswordCheckException extends AppException{};
class ModelSaveException extends AppException{};
class ModelNotFoundException extends AppException{};
class InvalidTokenException extends AppException{};
class MaxExceededException extends AppException{};
class ModelDeleteException extends AppException{};