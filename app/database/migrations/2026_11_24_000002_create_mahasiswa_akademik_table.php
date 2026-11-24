<?php

return new class {
    public function up()
    {
        Schema::create('mahasiswa_akademik', function ($table) {
            $table->id();
            $table->foreignId('jurusan_id')->constrained('jurusan')->restrictOnDelete();
            $table->string('nim', 20)->unique();
            $table->string('nama', 100);
            $table->year('angkatan');
            $table->integer('semester');
            $table->text('alamat')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mahasiswa_akademik');
    }
};