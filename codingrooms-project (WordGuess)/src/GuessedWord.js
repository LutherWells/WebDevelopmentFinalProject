import React from "react";

function GuessedWord(props) {
   const word = props.word;
   const wordToGuess = props.wordToGuess;
   console.log(word);
   // TODO: Use different key and proper className
   return (
      <>
         {word.split("").map((letter, index) => {
            if (letter == wordToGuess.charAt(index)){
               return (
                  <span key={index}
                     className="correct">{letter}</span>
               );
            }
            else if (wordToGuess.includes(letter)){
               return (
                  <span key={index}
                     className="wrong-place">{letter}</span>
               );
            }
            else{
               return (
                  
                  <span key={index}
                     className="not-part">{letter}</span>
               );
            }
         })}
      </>
   );
}

export default GuessedWord;
