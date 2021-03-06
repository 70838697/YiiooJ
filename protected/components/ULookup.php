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

	const CONTENT_TYPE_WIKI=1;
	const CONTENT_TYPE_MARKDOWN=2;
	const CONTENT_TYPE_HTML=4;
	public static $CONTENT_TYPE_MESSAGES=array(
		self::CONTENT_TYPE_WIKI=>'Wiki',
		self::CONTENT_TYPE_MARKDOWN=>'Markdown',
		self::CONTENT_TYPE_HTML=>'HTML',
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
	const JUDGE_RESULT_CAN_NOT_JUDGE=10;
	const JUDGE_RESULT_JUDGER_INTERNAL_ERROR=11;
	const JUDGE_RESULT_JUDGER_SPECIAL_JUDGER_ERRORR=12;
	
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
		self::JUDGE_RESULT_NO_THIS_COMPILER=>'No this compiler or no test data',
		self::JUDGE_RESULT_CAN_NOT_JUDGE=>'Can not judge',
		self::JUDGE_RESULT_JUDGER_INTERNAL_ERROR=>'The judger has a fatal error',
		self::JUDGE_RESULT_JUDGER_SPECIAL_JUDGER_ERRORR=>'The special judger has a fatal error',
		
	);
	
	const PRACTICE_STATUS_PUBLIC=0;
	const PRACTICE_STATUS_TEACHER=1;
	const PRACTICE_STATUS_PRIVATE=2;
	public static $PRACTICE_STATUS_MESSAGES=array(
		self::PRACTICE_STATUS_PUBLIC=>'Public',
		self::PRACTICE_STATUS_TEACHER=>'Only teachers can view',
		self::PRACTICE_STATUS_PRIVATE=>'Private',
	);
	const EXAMINATION_PROBLEM_TYPE_FOLDER=0;
	const EXAMINATION_PROBLEM_TYPE_MULTIPLE_CHOICE_SINGLE=1;
	const EXAMINATION_PROBLEM_TYPE_MULTIPLE_CHOICE_MULTIPLE=2;
	const EXAMINATION_PROBLEM_TYPE_FILL=4;
	const EXAMINATION_PROBLEM_TYPE_QUESTION=6;
	const EXAMINATION_PROBLEM_TYPE_PROGRAMMING=10;
	public static $EXAMINATION_PROBLEM_TYPE_MESSAGES=array(
		self::EXAMINATION_PROBLEM_TYPE_MULTIPLE_CHOICE_SINGLE=>'Multiple choices (1 answer)',
		self::EXAMINATION_PROBLEM_TYPE_MULTIPLE_CHOICE_MULTIPLE=>'Multiple choices (many answers)',
		self::EXAMINATION_PROBLEM_TYPE_FILL=>'Fill empty',
		self::EXAMINATION_PROBLEM_TYPE_QUESTION=>'Question',
		self::EXAMINATION_PROBLEM_TYPE_PROGRAMMING=>'Programming problem',
	);
	public static $EXAMINATION_PROBLEM_TYPE_COMMON_MESSAGES1=array(
			//self::EXAMINATION_PROBLEM_TYPE_FILL=>'Fill empty',
			self::EXAMINATION_PROBLEM_TYPE_QUESTION=>'Question',
	);	
	public static $EXAMINATION_PROBLEM_TYPE_COMMON_MESSAGES2=array(
			self::EXAMINATION_PROBLEM_TYPE_MULTIPLE_CHOICE_SINGLE=>'Multiple choices (1 answer)',
			self::EXAMINATION_PROBLEM_TYPE_MULTIPLE_CHOICE_MULTIPLE=>'Multiple choices (many answers)',
	);
	
}