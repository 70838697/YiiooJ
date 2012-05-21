<?php
class ULookup
{
	const RECORD_STATUS_PUBLIC=0;
	const RECORD_STATUS_PRIVATE=1;
	const RECORD_STATUS_DELETE=8;
	public static $RECORD_STATUS_MESSAGES=array(
		self::RECORD_STATUS_PUBLIC=>'Public',
		self::RECORD_STATUS_PRIVATE=>'Private',
		self::JUDGE_RESULT_PENDING=>'Deleted',
	);
	public static $PROBLEM_NORMAL_VISIBILITY_MESSAGES=array(
		self::RECORD_STATUS_PUBLIC=>'Public',
		self::RECORD_STATUS_PRIVATE=>'Private',
	);
	

	public static $PROBLEM_MEMORY_LIMITS=array(
		2097152=>'2M',
		4194304=>'4M',
		8388608=>'8M',
		16777216=>'16M',
		33554432=>'32M',
		67108864=>'64M',
		134217728=>'128M',
		268435456=>'256M',
	);

	const JUDGE_RESULT_PENDING=0;
	const JUDGE_RESULT_ACCEPTED=1;
	const JUDGE_RESULT_COMPILE_ERROR=2;
	const JUDGE_RESULT_PRESENTATION_ERROR=3;
	const JUDGE_RESULT_WRONG_ANSWER=4;
	const JUDGE_RESULT_TIME_LIMIT_EXCEED=5;
	const JUDGE_RESULT_MEMORY_LIMIT_EXCEED=6;
	const JUDGE_RESULT_RUNTIME_ERROR=7;
	const JUDGE_RESULT_OUTPUT_BUFFER_EXCEED=8;
	const JUDGE_RESULT_NO_THIS_COMPILER=9;
	public static $JUDGE_RESULT_MESSAGES=array(
		self::JUDGE_RESULT_PENDING=>'Pending',
		self::JUDGE_RESULT_ACCEPTED=>'Accepted',
		self::JUDGE_RESULT_COMPILE_ERROR=>'Compilation Error',
		self::JUDGE_RESULT_PRESENTATION_ERROR=>'Presentation Error',
		self::JUDGE_RESULT_WRONG_ANSWER=>'Wrong Answer',
		self::JUDGE_RESULT_TIME_LIMIT_EXCEED=>"Time Limit Exceed",
		self::JUDGE_RESULT_MEMORY_LIMIT_EXCEED=>"Memory Limit Exceed",
		self::JUDGE_RESULT_RUNTIME_ERROR=>'Runtime Error',
		self::JUDGE_RESULT_OUTPUT_BUFFER_EXCEED=>'Output Buffer Exceed',
		self::JUDGE_RESULT_NO_THIS_COMPILER=>'No this compiler',
	);
}