<?php

function keepFormValue($value) {
	if(isset($value)) {
		return htmlentities($value);
	}
}