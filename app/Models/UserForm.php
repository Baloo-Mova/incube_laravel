<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserForm
 *
 * @property integer $id
 * @property integer $author_id
 * @property integer $form_type_id
 * @property integer $publisher_id
 * @property integer $status_id
 * @property integer $economic_activities_id
 * @property integer $country_id
 * @property integer $city_id
 * @property integer $stage_id
 * @property string $name
 * @property string $description
 * @property integer $money
 * @property string $duration_project
 * @property string $term_refund
 * @property string $plan_rent
 * @property string $first_name
 * @property string $second_name
 * @property string $last_name
 * @property string $date_birth
 * @property string $experience
 * @property string $education
 * @property string $internship
 * @property string $logo
 * @property string $participation_projects
 * @property string $adress
 * @property string $phone
 * @property string $idea
 * @property string $current_situation
 * @property string $field
 * @property string $problem
 * @property string $solution
 * @property string $competition
 * @property string $benefits
 * @property string $buisness_model
 * @property string $money_target
 * @property string $investor_interest
 * @property string $risks
 * @property string $request_email
 * @property string $about
 * @property string $requirements
 * @property string $working_conditions
 * @property string $duties
 * @property string $company_name
 * @property string $company_info
 * @property string $other
 * @property string $contacts
 * @property string $site
 * @property string $youtube_link
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereAuthorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereFormTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm wherePublisherId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereEconomicActivitiesId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereCountryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereCityId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereStageId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereMoney($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereDurationProject($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereTermRefund($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm wherePlanRent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereSecondName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereDateBirth($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereExperience($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereEducation($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereInternship($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereParticipationProjects($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereAdress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereIdea($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereCurrentSituation($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereField($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereProblem($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereSolution($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereCompetition($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereBenefits($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereBuisnessModel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereMoneyTarget($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereInvestorInterest($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereRisks($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereRequestEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereAbout($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereRequirements($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereWorkingConditions($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereDuties($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereCompanyName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereCompanyInfo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereOther($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereContacts($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereSite($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereYoutubeLink($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserForm whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\User $author
 * @property-read \App\Models\TableType $formType
 * @property-read \App\User $publisher
 * @property-read \App\Models\Status $status
 * @property-read \App\Models\EconomicActivity $economicActivities
 * @property-read \App\Models\Country $country
 * @property-read \App\Models\City $city
 * @property-read \App\Models\Stage $stage
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document[] $documents
 */
class UserForm extends Model
{
    protected $table = 'user_form';

    public $timestamps = true;

    protected $fillable = [
        'logo',
        'name',
        'description',
        'money',
        'duration_project',
        'term_refund',
        'plan_rent',
        'first_name',
        'second_name',
        'last_name',
        'date_birth',
        'experience',
        'education',
        'internship',
        'participation_projects',
        'adress',
        'phone',
        'idea',
        'current_situation',
        'field',
        'problem',
        'solution',
        'competition',
        'benefits',
        'buisness_model',
        'money_target',
        'investor_interest',
        'risks',
        'request_email',
        'about',
        'requirements',
        'working_conditions',
        'duties',
        'company_name',
        'company_info',
        'other',
        'contacts', 'author_id',
        'publisher_id',
        'status_id',
        'economic_activities_id',
        'country_id',
        'city_id',
        'stage_id',
        'site',
        'youtube_link'
    ];

    protected $guarded = [
        'form_type_id',
    ];

    public function author(){
        return $this->belongsTo(User::class);
    }

    public function formType(){
        return $this->belongsTo(TableType::class);
    }

    public function publisher(){
        return $this->belongsTo(User::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function economicActivities(){
        return $this->belongsTo(EconomicActivity::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function stage(){
        return $this->belongsTo(Stage::class);
    }

    public function documents(){
        return $this->hasMany(Document::class,'form_id');
    }

    public function scopeWithAll($query){
        return $query->with($this->allRelations);
    }

    protected $allRelations = [
        'author',
        'formType',
        'publisher',
        'status',
        'economicActivities',
        'country',
        'city',
        'stage',
        'documents'
    ];


}