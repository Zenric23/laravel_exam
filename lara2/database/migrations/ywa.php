$table->id("class_id");
            $table->string("course_code");
            $table->string("desc");
            $table->double("units");
            $table->foreign("teacher_id")->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();