<?php

function rupiah($angka)
{
	return 'Rp. '.strrev(implode('.',str_split(strrev(strval($angka)),3)));
}