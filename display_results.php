<?php

  function display_results($query) {
    // retrieve all the fields as an array
    $fields = mysqli_fetch_fields($query);

    // create column headers by using the field names
    $header_row = '';
    foreach ($fields as $field) {
      $header_row .= '<div class="col-md-2 column-header"><span class="bold">' . $field->name . '</span></div>';
    }

    // create rows of data
    $records = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $data_rows = '';
    foreach ($records as $record) {
      $data_rows .= '<div class="row data-rows">';

      foreach ($fields as $field) {
        $data_rows .= '<div class="col-md-2 data-rows-inside">' . $record[$field->name] . '</div>';
      }

      $data_rows .= '</div>';
    }

    return '<div class="row "> ' . $header_row . '</div>' . $data_rows . '<hr>';
    
  }
