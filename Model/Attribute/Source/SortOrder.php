<?php
namespace SR\CategorySortOrder\Model\Attribute\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class SortOrder  extends AbstractSource
{
    /**
     * Get all options
     *
     * @return array
     */
    public function getAllOptions()
    {
        if ($this->_options === null) {
            $this->_options = [
                ['value' => 'asc', 'label' => __('Ascending')],
                ['value' => 'desc', 'label' => __('Descending')]
            ];
        }
        return $this->_options;
    }

}