<?php 
App::uses('ExceptionRenderer', 'Error');

class AppExceptionRenderer extends ExceptionRenderer {

	/*-------------------------------------------------------------------------*/
	/* -- Exceptions
	/*-------------------------------------------------------------------------*/

	public function notFound($error) {
		$this->controller->redirect(array('controller' => 'users', 'action' => 'logout'));
	}
	public function badRequest($error) {
		$this->controller->redirect(array('controller' => 'users', 'action' => 'logout'));
	}
	public function forbidden($error) {
		$this->controller->redirect(array('controller' => 'users', 'action' => 'logout'));
	}
	public function methodNotAllowed($error) {
		$this->controller->redirect(array('controller' => 'users', 'action' => 'logout'));
	}
	public function internalError($error) {
		$this->controller->redirect(array('controller' => 'users', 'action' => 'logout'));
	}
	public function notImplemented($error) {
		$this->controller->redirect(array('controller' => 'users', 'action' => 'logout'));
	}

	/*-------------------------------------------------------------------------*/
	/* -- Other
	/*-------------------------------------------------------------------------*/

	public function missingController($error) {
		$this->notFound($error);
	}
	public function missingAction($error) {
		$this->notFound($error);
	}
	public function missingView($error) {
		$this->notFound($error);
	}
	public function missingLayout($error) {
		$this->internalError($error);
	}
	public function missingHelper($error) {
		$this->internalError($error);
	}
	public function missingBehavior($error) {
		$this->internalError($error);
	}
	public function missingComponent($error) {
		$this->internalError($error);
	}
	public function missingTask($error) {
		$this->internalError($error);
	}
	public function missingShell($error) {
		$this->internalError($error);
	}
	public function missingShellMethod($error) {
		$this->internalError($error);
	}
	public function missingDatabase($error) {
		$this->internalError($error);
	}
	public function missingConnection($error) {
		$this->internalError($error);
	}
	public function missingTable($error) {
		$this->internalError($error);
	}
	public function privateAction($error) {
		$this->internalError($error);
	}

	/*-------------------------------------------------------------------------*/
	/*-------------------------------------------------------------------------*/
}