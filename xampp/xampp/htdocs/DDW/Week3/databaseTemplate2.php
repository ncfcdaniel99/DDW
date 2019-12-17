d_edit_class . ' ' . $not_null_class . ' '
            . $relation_class . ' ' . $hide_class . ' ' . $field_type_class;

        return $class;

    } // end of the '_getClassesForColumn()' function


    /**
     * Get class for datetime related fields
     *
     * @param string $type the type of the column field
     *
     * @return  string  $field_type_class   the class for the column
     *
     * @access  private
     *
     * @see     _getTableBody()
     */
    private function _getClassForDateTimeRelatedFields($type)
    {
        if ((substr($type, 0, 9) == self::TIMESTAMP_FIELD)
            || ($type == self::DATETIME_FIELD)
        ) {
            $field_type_class = 'datetimefield';
        } elseif ($type == self::DATE_FIELD) {
            $field_type_class = 'datefield';
        } elseif ($type == self::TIME_FIELD) {
            $field_type_class = 'timefield';
        } elseif ($type == self::STRING_FIELD) {
            $field