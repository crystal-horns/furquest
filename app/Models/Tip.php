<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 28 Jul 2019 16:28:11 -0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tip
 * 
 * @property int $id
 * @property int $quest_id
 * @property int $step_id
 * @property string $content
 * @property int $map
 * @property int $delay
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property Quest $quest
 * @property Step $step
 * @property \Illuminate\Database\Eloquent\Collection $user_quests
 * @property \Illuminate\Database\Eloquent\Collection $user_quest_steps
 *
 * @package App\Models
 */
class Tip extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'quest_id' => 'int',
		'step_id' => 'int',
		'map' => 'int',
		'delay' => 'int'
	];

	protected $fillable = [
		'quest_id',
		'step_id',
		'content',
		'map',
		'delay'
	];

	public function quest()
	{
		return $this->belongsTo(Quest::class);
	}

	public function step()
	{
		return $this->belongsTo(Step::class);
	}

	public function user_quests()
	{
		return $this->belongsToMany(UserQuest::class, 'user_quest_step_tip')
					->withPivot('id', 'user_quest_step_id', 'deleted_at')
					->withTimestamps();
	}

	public function user_quest_steps()
	{
		return $this->belongsToMany(UserQuestStep::class, 'user_quest_step_tip')
					->withPivot('id', 'user_quest_id', 'deleted_at')
					->withTimestamps();
	}
}
