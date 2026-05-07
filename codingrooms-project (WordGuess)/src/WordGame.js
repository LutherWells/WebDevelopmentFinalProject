import React from "react";
import { useState } from "react";
import GuessedWord from "./GuessedWord.js";
let winMessage = '';

function WordGame(props) {
   const wordToGuess = props.word;

   // TODO: Modify initialization
   const [prevGuesses, setPrevGuesses] = useState([]);

   // TODO: Add other state variables
   const [currentGuess, setCurrentGuess] = useState("");
   const [guessCount, setGuessCount] = useState(1);
   const [wonGame, setWonGame] = useState(false);
   
   
   function handleKeyDown(event) {
      // TODO: Complete this function
      //setCurrentGuess(event.key.toUpperCase());
      if (event.key === 'Enter' && currentGuess.length == 5){
         setPrevGuesses(prevGuesses => [...prevGuesses, currentGuess]);
         
         console.log("guess made");
         console.log(prevGuesses[prevGuesses.length - 1] + " correct? " + (prevGuesses[prevGuesses.length - 1] == wordToGuess));
         console.log("before " +wonGame);
         if (currentGuess == wordToGuess) {
            console.log("WIN?");
            
            
            
            if (guessCount == 1){
               winMessage = "Congratulations! It took you 1 try.";
            }
            else{
               winMessage = `Congratulations! It took you ${guessCount} tries.`
            }
            setWonGame(true);
         }
         else{
            setGuessCount(guessCount + 1);
         }
         console.log("after " + wonGame);
         
         setCurrentGuess("");
         console.log(winMessage);
      }
   }

   function handleChange(event) {
      // TODO: Complete this function
      //console.log((event.key).toUpperCase());
      setCurrentGuess(event.target.value.toUpperCase());
   }
   //prevGuesses[prevGuesses.length - 1]
   return (
      <>
         {prevGuesses.map((item, index) => (
         <p>
            { /* TODO: Modify GuessedWord to display all previous guesses */ }
            
               
               <GuessedWord guessNum="index" wordToGuess={wordToGuess} word={prevGuesses[index]}/>
               
            
            
         </p>
         ))}
         { wonGame == false ?
            <p>
               { /* TODO: If guess is correct, show congratulations message */ }
               
               { /* TODO: Modify label text and add necessary attributes to <input> */ }
               <label htmlFor="word-entry">Guess {guessCount}:</label>
               <input type="text"
                  id="word-entry"
                  size="5"
                  maxLength="5"
                  value={currentGuess} 
                  onKeyDown={handleKeyDown}
                  onChange={handleChange}/>
            </p>
         
         :
         
            <p>{winMessage}</p>
           
            }
      </>
   );
}

export default WordGame;