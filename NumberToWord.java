//package Lifecracker87;

/**
 *
 * @author bhim
 */
import static oracle.jrockit.jfr.events.Bits.intValue;

public class NumberToWord {

    private long number;
    private String[] map = {"सुन्य","एक", "दुइ", "तिन", "चार", "पाँच", "छ", "सात", "आठ", "नौ",
        "दश", "एघार", "बाह्र", "तेह्र", "चौध", "पन्ध्र", "सोह्र", "सत्र", "अठार", "उन्नाइस",
        "बिस", "एक्काइस", "बाइस", "तेइस", "चौबिस", "पच्चिस", "छब्बिस", "सत्ताइस", "अठ्ठाइस", "उनान्तिस",
        "तिस", "एकतिस", "बत्तिस", "तेत्तिस", "चौतिस", "पैतिस", "छत्तिस", "सैतिस", "अठतिस", "उनान्चालिस",
        "चालिस", "एकचालिस", "बयालिस", "त्रिचालिस", "चवालिस", "पैतालिस", "छयालिस", "सत्चालिस", "अठ्चालिस", "उनन्चास",
        "पचास", "एकाउन्न", "बाउन्न", "त्रिपन्न", "चौवन्न", "पचपन्न", "छपन्न", "सन्ताउन्न", "अन्ठाउन्न", "उनन्साठी",
        "साठी", "एकसठ्ठी", "बैसठ्ठी", "त्रिसठ्ठी", "चौसठ्ठी", "पैंसठ्ठी", "छैसठ्ठी", "सत्सठ्ठी", "अठ्सठ्ठी", "उनान्सत्तरी",
        "सत्तरी", "एकहत्तर", "बहत्तर", "त्रिहत्तर", "चौरहत्तर", "पचहत्तर", "छयत्तर", "सतहत्तर", "अठहत्तर", "उनासी",
        "असी", "एकासी", "बयासी", "त्रियासी", "चौरासी", "पचासी", "छयासी", "सतासी", "अठासी", "उनान्नब्बे",
        "नब्बे", "एकान्नब्बे", "बयान्नब्बे", "त्रियान्नब्बे", "चौरान्नब्बे", "पन्चान्नब्बे", "छ्यान्नब्बे", "सन्तान्नब्बे", "अन्ठान्नब्बे", "उनान्सय"
    };

    public NumberToWord(String num) {
        this.number = Long.parseLong(num);
    }

    private String _convertToStr(long num) {
        String nepstring = "";
        if(num > 9999999999999l)
           return "Not Avaliable";

        if (num == 0) {
            return this.map[0];
        }

        if(num >=100000000000l)
         {
         nepstring+=this.map[intValue(num/100000000000l)]+" खरव ";
         long v=num/100000000000l;
         num-=v*100000000000l;
         this._convertToStr(num);
            
         }
        
         if(num >=1000000000)
         {
         nepstring += this.map[intValue(num/1000000000)]+" अरव ";
         long v=num/1000000000;
         num-=v*1000000000;
         this._convertToStr(num);
         }
        
         if((num/10000000) > 0)
         {
         nepstring +=this.map[intValue(num/10000000)]+" करोड ";
         num%=10000000;
         this._convertToStr(num);
         }
         
        if ((num / 100000) > 0) {
            nepstring += this.map[intValue(num / 100000)] + " लाख ";
            num %= 100000;
            this._convertToStr(num);
        }

        if ((num / 1000) > 0) {
            nepstring += this.map[intValue(num / 1000)] + " हजार ";
            num %= 1000;
            this._convertToStr(num);
        }

        if ((num / 100) > 0) {
            nepstring += this.map[intValue(num / 100)] + " सय ";
            num %= 100;
            this._convertToStr(num);
        }

        if (num < 100 && num > 0) {
            nepstring += this.map[intValue(num)];
        }

        return nepstring;
    }

    public String getInWords() {
        return this._convertToStr(this.number);
    }

    //Implementation:, To use this class for real application, remove the main method below
    public static void main(String[] arg) {
        NumberToWord n = new NumberToWord("0010023456");
        System.out.println(n.getInWords());
    }
}

