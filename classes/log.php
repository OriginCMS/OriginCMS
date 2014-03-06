<?php

class log {
    public function log ($msg) {
        $data = $msg;
                $file = "log.log";
		$handle = fopen($file, 'a');
		if (fwrite($handle, $data) === FALSE) {$createfile = fopen($file, 'a');return false; }
		fclose($handle);
    }
}
