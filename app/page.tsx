"use client";

import "./pokedexDesign.css";
import { useState } from "react";

export default function Page() {

    const [pokemon, setPokemon] = useState<any>(null);
    const [search, setSearch] = useState("");
    const [error, setError] = useState("");

    async function searchPokemon() {

        if (search.trim() === "") {
            setError("Please enter a pokemon");
            setPokemon(null);
            return;
        }

        try {

            const response = await fetch(
                `https://pokeapi.co/api/v2/pokemon/${search.toLowerCase()}`
            );

            if (!response.ok) {
                throw new Error("Pokemon not found");
            }

            const data = await response.json();

            setPokemon(data);
            setError("");

        } catch {

            setPokemon(null);
            setError("Pokemon not found");
        }
    }

    return (
        <div className="body">

            <div className="pokedex">

                {/* LEFT */}

                <div className="left-panel">

                    <div className="top-area">

                        <div className="big-light"></div>

                        <div className="top-right">

                            <div className="small-lights">
                                <div className="small-light red"></div>
                                <div className="small-light yellow"></div>
                                <div className="small-light green"></div>
                            </div>

                            <div className="search-area">

                                <input
                                    type="text"
                                    className="search-input"
                                    placeholder="SEARCH..."
                                    value={search}
                                    onChange={(e) => setSearch(e.target.value)}
                                    onKeyDown={(e) => {
                                        if (e.key === "Enter") {
                                            searchPokemon();
                                        }
                                    }}
                                />

                                <button
                                    className="search-btn"
                                    onClick={searchPokemon}
                                >
                                    Search
                                </button>

                            </div>

                        </div>

                    </div>

                    <div className="curve-line"></div>

                    <div className="screen-box">

                        <div className="screen-dots">
                            <div className="screen-dot"></div>
                            <div className="screen-dot"></div>
                        </div>

                        <div className="main-screen">

                            {pokemon ? (
                                <>
                                    <img
                                        src={pokemon.sprites.front_default}
                                        alt={pokemon.name}
                                        className="pokemon-image"
                                    />

                                    <p className="pokemon-name">
                                        {pokemon.name.toUpperCase()}
                                    </p>
                                </>
                            ) : (
                                <p>{error ? error : "READY..."}</p>
                            )}

                        </div>

                        <div className="small-red-light"></div>

                        <div className="speaker">
                            <div className="speaker-line"></div>
                            <div className="speaker-line"></div>
                            <div className="speaker-line"></div>
                            <div className="speaker-line"></div>
                        </div>

                    </div>

                    <div className="bottom-controls">

                        <div className="blue-btn"></div>

                        <div className="green-btn"></div>

                        <div className="orange-btn"></div>

                        <div className="dpad">
                            <div className="dpad-v"></div>
                            <div className="dpad-h"></div>
                            <div className="dpad-center"></div>
                        </div>

                    </div>

                </div>

                {/* CENTER */}

                <div className="middle"></div>

                {/* RIGHT */}

                <div className="right-panel">

                    <div className="white-top"></div>

                    <div className="right-screen">

                        {pokemon ? (
                            <>
                                <p>ID: {pokemon.id}</p>

                                <p>
                                    TYPE:{" "}
                                    {pokemon.types
                                        .map((t: any) => t.type.name)
                                        .join(", ")}
                                </p>

                                <p>HEIGHT: {pokemon.height}</p>

                                <p>WEIGHT: {pokemon.weight}</p>
                            </>
                        ) : (
                            <p>WAITING FOR INPUT...</p>
                        )}

                    </div>

                    <div className="number-buttons">

                        <button className="num-btn"></button>
                        <button className="num-btn"></button>
                        <button className="num-btn"></button>
                        <button className="num-btn"></button>
                        <button className="num-btn"></button>

                        <button className="num-btn"></button>
                        <button className="num-btn"></button>
                        <button className="num-btn"></button>
                        <button className="num-btn"></button>
                        <button className="num-btn"></button>

                    </div>

                    <div className="status-row">

                        <div className="small-orange"></div>
                        <div className="small-green"></div>

                        <div className="long-green"></div>
                        <div className="long-orange"></div>

                    </div>

                    <div className="action-buttons">
                        <button className="action-btn"></button>
                        <button className="action-btn"></button>
                    </div>

                </div>

            </div>

        </div>
    );
}