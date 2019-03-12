<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'published_at', 'user_id'];
    protected $dates = ['published_at']; // теперь наш дополнительный timestamp будет возвращаться как сконвертированный экземпляр Carbon
    
	/*
	 * связть task и user
	 */
	public function user()
	{
		// задача принадлежит только одному пользователю
		return $this->belongsTo(User::class);
	}
	
	
    /* ОБЛАСТИ ЗАПРОСОВ
     * scope для published, выберет статьи опубликованные до текущего момента времени
     */
    public function scopePublished($query)
	{
		$query->where('published_at', '<=', Carbon::now());
	}
	
	/* ОБЛАСТИ ЗАПРОСОВ
	 * выберет не опубликованные статьи (у которых дата публикации указана больше, чем текущий момент времени)
	 */
	public function scopeUnpublished($query){
    	$query->where('published_at', '>', Carbon::now());
	}
	
	
    
    /* МУТАТОР
     * изменяем получаемые данные перед добавлением в базу данных (мутатор)
     * соглашение по именованию: сначала идет set, далее имя поля бд, далее Attribute = setPublishedAtAttribute
     */
    public function setPublishedAtAttribute($date){
    	$this->attributes['published_at'] = Carbon::parse($date);
	}
}
