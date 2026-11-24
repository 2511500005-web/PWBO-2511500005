<?php

return new class {
    public function up()
    {
        Schema::create('jurusan', function ($table) {
            $table->id();
            $table->string('nama_jurusan', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jurusan');
    }
};