<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image');
            $table->boolean('paid')->default('0');
            $table->timestamps();
        });

        DB::table('products')->insert(
            array(
                array(
                    'title' => 'Where do you see yourself 5 years down the line?',
                    'description' => 'This is by far the most frequently asked question in Interviews',
                    'paid' => '0',
                    'image' => 'product/1'
                ),
                array(
                    'title' => 'Describe Yourself?',
                    'description' => 'This is by far the most frequently asked question in Interviews',
                    'paid' => '0',
                    'image' => 'product/2'
                ),
                array(
                    'title' => 'Tell us about your work experience?',
                    'description' => 'This is by far the most frequently asked question in Interviews',
                    'paid' => '0',
                    'image' => 'product/3'
                ),
                array(
                    'title' => 'What is your expected CTC?',
                    'description' => 'This is by far the most frequently asked question in Interviews',
                    'paid' => '1',
                    'image' => 'product/4'
                ),
                array(
                    'title' => 'Are you willing to relocate?',
                    'description' => 'This is by far the most frequently asked question in Interviews',
                    'paid' => '1',
                    'image' => 'product/5'
                ),
                array(
                    'title' => 'How does our goals align to your values?',
                    'description' => 'This is by far the most frequently asked question in Interviews',
                    'paid' => '1',
                    'image' => 'product/6'
                )
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
