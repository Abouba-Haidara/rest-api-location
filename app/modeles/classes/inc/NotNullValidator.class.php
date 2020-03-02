<?php

	
	class NotNullValidator extends HandlerError
	{
		public function isValid($value)
		{
			return $value != '';
		}
	}