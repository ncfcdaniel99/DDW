d
     *                                             or not
     * @param object|string $transformation_plugin the name of transformation
     *                                             function
     * @param string        $default_function      the default transformation
     *                                             function
     * @param string        $transform_options     the transformation parameters
     * @param array         $analyzed_sql_results  the analyzed query
     *
     * @return  string  $cell                  the prepared data cell, html content
     *
     * @access  private
     *
     * @see     _getTableBody()
     */
    private function _getDataCellForGeometryColumns(
        $column, $class, $meta, array $map, array $_url_params, $condition_field,
        $transformation_plugin, $default_function, $transform_options,
        array $analyzed_sql_results
    ) {
        if (! isset($column) || is_null($column)) {
            $cell = $this->_buildNullDisplay($class, $condition_field, $meta);
            return $cell;
        }

        if ($column == '') {
            $cell = 