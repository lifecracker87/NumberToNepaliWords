<?php

/**
 * NumberToString is a class which converts the given ascii number into
 * nepali style Nepali word(string) format.
 * we can still add the functionality for other greater numbers( सय, हजार, लाख, करोड, अरव, खरव, नील, पद्म, शंख, महाशंख )
 *
 * @author bhim || lifecracker87
 */
class NumberToWord 
{

    private $number;
    private $numToNepaliWord = array("सुन्य","एक", "दुइ", "तिन", "चार", "पाँच", "छ", "सात", "आठ", "नौ",
        "दश", "एघार", "बाह्र", "तेह्र", "चौध", "पन्ध्र", "सोह्र", "सत्र", "अठार", "उन्नाइस",
        "बिस", "एक्काइस", "बाइस", "तेइस", "चौबिस", "पच्चिस", "छब्बिस", "सत्ताइस", "अठ्ठाइस", "उनान्तिस",
        "तिस", "एकतिस", "बत्तिस", "तेत्तिस", "चौतिस", "पैतिस", "छत्तिस", "सैतिस", "अठतिस", "उनान्चालिस",
        "चालिस", "एकचालिस", "बयालिस", "त्रिचालिस", "चवालिस", "पैतालिस", "छयालिस", "सत्चालिस", "अठ्चालिस", "उनन्चास",
        "पचास", "एकाउन्न", "बाउन्न", "त्रिपन्न", "चौवन्न", "पचपन्न", "छपन्न", "सन्ताउन्न", "अन्ठाउन्न", "उनन्साठी",
        "साठी", "एकसठ्ठी", "बैसठ्ठी", "त्रिसठ्ठी", "चौसठ्ठी", "पैंसठ्ठी", "छैसठ्ठी", "सत्सठ्ठी", "अठ्सठ्ठी", "उनान्सत्तरी",
        "सत्तरी", "एकहत्तर", "बहत्तर", "त्रिहत्तर", "चौरहत्तर", "पचहत्तर", "छयत्तर", "सतहत्तर", "अठहत्तर", "उनासी",
        "असी", "एकासी", "बयासी", "त्रियासी", "चौरासी", "पचासी", "छयासी", "सतासी", "अठासी", "उनान्नब्बे",
        "नब्बे", "एकान्नब्बे", "बयान्नब्बे", "त्रियान्नब्बे", "चौरान्नब्बे", "पन्चान्नब्बे", "छ्यान्नब्बे", "सन्तान्नब्बे", "अन्ठान्नब्बे", "उनान्सय" );

    public function __construct($number) {
        $this->number = $number;
    }

    private function _convertToStr($num) {
        $nepstring = '';
        if (!is_numeric($num) || $num > 9999999999999)
            return FALSE;

        if ($num == 0)
            return $this->numToNepaliWord[0];

        if ($num >= 100000000000) {
            $nepstring.=$this->numToNepaliWord[$num / 100000000000] . " खरव ";
            $v = $num / 100000000000;
            $num-=(int) $v * 100000000000;
            $this->_convertToStr($num);
        }

        if ($num >= 1000000000) {
            $nepstring.=$this->numToNepaliWord[$num / 1000000000] . " अरव ";
            $v = $num / 1000000000;
            $num-=(int) $v * 1000000000;
            $this->_convertToStr($num);
        }

        if ((int) ($num / 10000000) > 0) {
            $nepstring.=$this->numToNepaliWord[(int) $num / 10000000] . " करोड ";
            $num%=10000000;
            $this->_convertToStr($num);
        }

        if ((int) ($num / 100000) > 0) {
            $nepstring.=$this->numToNepaliWord[(int) $num / 100000] . " लाख ";
            $num%=100000;
            $this->_convertToStr($num);
        }

        if ((int) ($num / 1000) > 0) {
            $nepstring.=$this->numToNepaliWord[(int) $num / 1000] . " हजार ";
            $num%=1000;
            $this->_convertToStr($num);
        }

        if ((int) ($num / 100 ) > 0) {
            $nepstring.=$this->numToNepaliWord[(int) $num / 100] . " सय ";
            $num%=100;
            $this->_convertToStr($num);
        }

        if ($num < 100 && $num > 0) {
            $nepstring.=$this->numToNepaliWord[(int) $num];
        }

        return $nepstring;
    }

    public function getInWords() {
        return $this->_convertToStr($this->number);
    }

}

//end of file NumberToString.php