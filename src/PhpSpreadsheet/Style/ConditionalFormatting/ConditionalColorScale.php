<?php

namespace PhpOffice\PhpSpreadsheet\Style\ConditionalFormatting;

class ConditionalColorScale
{
    /** <colorScale> attribute  */

    /** @var null|bool */
    private $showValue;

    /** <colorScale> children */

    /** @var ?ConditionalFormatValueObject */
    private $minimumConditionalFormatValueObject;

    /** @var ?ConditionalFormatValueObject */
    private $midpointConditionalFormatValueObject;

    /** @var ?ConditionalFormatValueObject */
    private $maximumConditionalFormatValueObject;

    /** @var ?Color */
    private $minimumColor;

    /** @var ?Color */
    private $midpointColor;

    /** @var ?Color */
    private $maximumColor;

    /** <extLst> */

    /** @var ?ConditionalFormattingRuleExtension */
    private $conditionalFormattingRuleExt;

    /**
     * @return null|bool
     */
    public function getShowValue()
    {
        return $this->showValue;
    }

    /**
     * @param bool $showValue
     */
    public function setShowValue($showValue): self
    {
        $this->showValue = $showValue;

        return $this;
    }

    public function getMinimumConditionalFormatValueObject(): ?ConditionalFormatValueObject
    {
        return $this->minimumConditionalFormatValueObject;
    }

    public function setMinimumConditionalFormatValueObject(ConditionalFormatValueObject $minimumConditionalFormatValueObject): self
    {
        $this->minimumConditionalFormatValueObject = $minimumConditionalFormatValueObject;

        return $this;
    }

    public function getMidpointConditionalFormatValueObject(): ?ConditionalFormatValueObject
    {
        return $this->midpointConditionalFormatValueObject;
    }

    public function setMidpointConditionalFormatValueObject(ConditionalFormatValueObject $midpointConditionalFormatValueObject): self
    {
        $this->midpointConditionalFormatValueObject = $midpointConditionalFormatValueObject;

        return $this;
    }

    public function getMaximumConditionalFormatValueObject(): ?ConditionalFormatValueObject
    {
        return $this->maximumConditionalFormatValueObject;
    }

    public function setMaximumConditionalFormatValueObject(ConditionalFormatValueObject $maximumConditionalFormatValueObject): self
    {
        $this->maximumConditionalFormatValueObject = $maximumConditionalFormatValueObject;

        return $this;
    }

    public function getMinimumColor(): string
    {
        return $this->minimumColor;
    }

    public function setMinimumColor(string $minimumColor): self
    {
        $this->minimumColor = $minimumColor;

        return $this;
    }

    public function getMidpointColor(): ?string
    {
        return $this->midpointColor;
    }

    public function setMidpointColor(string $midpointColor): self
    {
        $this->midpointColor = $midpointColor;

        return $this;
    }

    public function getMaximumColor(): string
    {
        return $this->maximumColor;
    }

    public function setMaximumColor(string $maximumColor): self
    {
        $this->maximumColor = $maximumColor;

        return $this;
    }

    public function getConditionalFormattingRuleExt(): ?ConditionalFormattingRuleExtension
    {
        return $this->conditionalFormattingRuleExt;
    }

    public function setConditionalFormattingRuleExt(ConditionalFormattingRuleExtension $conditionalFormattingRuleExt): self
    {
        $this->conditionalFormattingRuleExt = $conditionalFormattingRuleExt;

        return $this;
    }
}