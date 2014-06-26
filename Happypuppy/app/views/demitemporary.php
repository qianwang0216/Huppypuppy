<!--    @foreach ($healths as $health)
    <div class="small-12 large-4 medium-6 columns" data-id="{{ $health->idMedical; }}">
        <div class="healthlist">
            
            <div class="dogInfoHead row">
                <div class="dogNameGender small-6 columns">
                    <div class="dogName text-center row"><label class="inline">Medical Information</label></div>
                </div>                               
            </div>
            <div class="dogInfoItem row">
                <div class="small-4 columns"><label class="right inline">Medication:</label></div>
                <div class="small-8 columns"><label class="left inline">{{ $health->medication; }}</label></div>
            </div>
            <div class="dogInfoItem row">
                <div class="small-4 columns"><label class="right inline">Allergies:</label></div>
                <div class="small-8 columns"><label class="left inline">{{ $health->allergies; }}</label></div>
            </div>
            <div class="dogInfoItem row">
                <div class="small-4 columns"><label class="right inline">Food Preference:</label></div>
                <div class="small-8 columns"><label class="left inline">{{ $health->food_preference; }}</label></div>
            </div>
            <div class="dogInfoItem row">
                <div class="small-4 columns"><label class="right inline">Daily Meal:</label></div>
                <div class="small-3 columns"><label class="left inline">{{ $health->daily_meal; }}</label></div>
            </div>
            <div class="dogInfoItem row">
                <div class="small-4 columns"><label class="right inline">Vaccine:</label></div>
                <div class="small-3 columns"><label class="left inline">{{ $health->vaccine; }}</label></div>
            </div>
            <div class="dogInfoItem row">
                <div class="small-4 columns"><label class="right inline">Disease:</label></div>
                <div class="small-3 columns"><label class="left inline">{{ $health->disease; }}</label></div>
            </div>
            <div class="dogInfoItem row">
                <div class="small-4 columns"><label class="right inline">Surgeries:</label></div>
                <div class="small-3 columns"><label class="left inline">{{ $health->surgeries; }}</label></div>
            </div>
            <div class="dogInfoItem row">
                <div class="small-4 columns"><label class="right inline">Next Vet Appointment:</label></div>
                <div class="small-3 columns"><label class="left inline">{{ $health->vet_date; }}</label></div>
            </div>
            <div class="dogInfoItem row">
                <div class="small-4 columns"><label class="right inline">Vet Appointment History:</label></div>
                <div class="small-3 columns"><label class="left inline">{{ $health->vet_history; }}</label></div>
            </div>
            <button>DELETE</button>
        </div>
    @endforeach
    
    <div class="health_edit">
        {{ Form::open(array('action' => 'HealthController@editHealthTracker', 'files' => true)) }}
       
        <div class="dogInfoItem row">
            <div class="small-4 columns"><label class="right inline">Medication:</label></div>
            <div class="small-8 columns"><input type="text" name="breed" value="{{ $health->medication; }}"></div>
        </div>
        <div class="dogInfoItem row">
            <div class="small-4 columns"><label class="right inline">Allergies:</label></div>
            <div class="small-8 columns"><input type="text" name="DOB" value="{{ $health->allergies; }}"></div>
        </div>
        <div class="dogInfoItem row">
            <div class="small-4 columns"><label class="right inline">Food Preference:</label></div>
            <div class="small-8 columns"><input type="text" name="color" value="{{ $health->food_preference; }}"></div>
        </div>
        <div class="dogInfoItem row">
            <div class="small-4 columns"><label class="right inline">Vaccine:</label></div>
            <div class="small-6 columns"><input type="text" name="weight" value="{{ $health->vaccine; }}"></div>
        </div>
        <div class="dogInfoItem row">
            <div class="small-4 columns"><label class="right inline">Surgeries:</label></div>
            <div class="small-8 columns"><textarea name="description" cols="20" cols="5">{{ $health->surgeries; }}</textarea></div>
        </div>
        <div class="dogInfoItem row">
            <div class="small-4 columns"><label class="right inline">Next Vet Appointment:</label></div>
            <div class="small-8 columns"><textarea name="description" cols="20" cols="5">{{ $health->vet_date; }}</textarea></div>
        </div>
        <div class="dogInfoItem row">
            <div class="small-4 columns"><label class="right inline">Vet Appointment History:</label></div>
            <div class="small-8 columns"><textarea name="description" cols="20" cols="5">{{ $health->vet_history; }}</textarea></div>
        </div>
        
        <input id="editHealth" name="submit" />

        {{ Form::close() }}
        </div>
    </div>-->