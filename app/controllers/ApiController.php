<?php

// Use Symphony's built in response code constants
use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Pagination\Paginator as Paginator;

class ApiController extends BaseController {
  
  /**
   * @var int
   */
  protected $statusCode = IlluminateResponse::HTTP_OK;
  
  /**
   * Get protected property
   */
  public function getStatusCode()
  {
    return $this->statusCode;
  }
  
  /**
   * Set protected property
   */
  public function setStatusCode($statusCode)
  {
    $this->statusCode = $statusCode;
    
    return $this;
  }
  
  /**
   * Generic function that returns a JSON object with messages and optional headers
   */
  public function respond($data, $headers = [])
  {
    return Response::json($data, $this->getStatusCode(), $headers);
  }
  
  /**
   * This builds our response with message and status code
   */
  public function respondWithError($message)
  {
    return $this->respond([
      'error' => [
        'message' => $message,
        'status_code' => $this->getStatusCode(),
      ]
    ]);
  }
  
  /**
   * 404 Response
   */
  public function respondNotFound($message = 'Not found.')
  {
    return $this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)->respondWithError($message); 
  }
  
  /**
   * 422 Response (Failed Validation)
   */
  protected function respondFailedValidation($message = 'Parameters failed validation')
  {
    return $this->setStatusCode(IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY)->respondWithError($message);
  }
  
  /**
   * 201 Response (Resource successfully created)
   */
  protected function respondCreated($message)
  {
    return $this->setStatusCode(IlluminateResponse::HTTP_CREATED)->respond([
      'status' => 'success',
      'message' => $message,
    ]);
  }
  
  /**
   * Helper method to respond with data limits and pagination
   * 
   * @param Paginator $object
   * @param $data array to be return
   * @returns mixed
   */
  protected function respondWithPagination(Paginator $object, $data)
  {
    $data = array_merge($data, [
      'paginator' => [
        'total_count' => $object->getTotal(),
        'total_pages' => ceil($object->getTotal() / $object->getPerPage()),
        'current_page' => $object->getCurrentPage(),
        'limit' => $object->getPerPage(),
      ],
    ]);
    
    return $this->respond($data); 
  }
  
}