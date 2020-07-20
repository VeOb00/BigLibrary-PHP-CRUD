USE cr10_vedrana_biglibrary;


insert into media
    (title, subtitle, author_fn, author_ln, media_type, publisher, publisher_address, publisher_size, date_published, availability, image, isbn13, description)
    values
("The Subtle Art of Not Giving a F*ck:", "A Counterintuitive Approach to Living a Good Life",
 "Mark", "Manson",
 "book",
 "Harper", "195 Broadway New York City, New York, US",
 "big",
 "2016-09-13",
 true,
 "the subtile art.jpg",
 "978-0062641540",
 "In this generation-defining self-help guide, a superstar blogger cuts through the crap to show us how to stop trying to be \"positive\" all the time so that we can truly become better, happier people. For decades, we've been told that positive thinking is the key to a happy, rich life. \"F**k positivity,\" Mark Manson says. \"Let's be honest, shit is f**ked and we have to live with it.\" In his wildly popular Internet blog, Manson doesn’t sugarcoat or equivocate. He tells it like it is—a dose of raw, refreshing, honest."
 ),
 ("The Book You Wish Your Parents Had Read", "(and Your Children Will Be Glad That You Did)",
  "Phillipa", "Perry",
  "book",
  "Penguin Life", "City of Westminster, London, England",
  "big",
  "2019-05-07",
  true,
  "the book you wish.jpg",
  "978-0241250990",
  "In this absorbing, clever and funny book, renowned psychotherapist Philippa Perry tells us what really matters and what behaviour it is important to avoid - the vital dos and don'ts of parenting. Instead of mapping out the 'perfect' plan, Perry offers a big-picture look at the elements that lead to good parent-child relationships."
 ),
("Brief Answers to the Big Questions:", "the final book from Stephen Hawking",
 "Stephen", "Hawking",
 "book",
 "John Murray", "London, United Kingdom",
 "small",
 "2020-05-05",
 true,
 "brief answers.jpg",
 "978-1473695993",
 "The world-famous cosmologist and #1 bestselling author of A Brief History of Time leaves us with his final thoughts on the universe''s biggest questions in this brilliant posthumous work. Is there a God? How did it all begin? Can we predict the future? What is inside a black hole? Is there other intelligent life in the universe? Will artificial intelligence outsmart us? How do we shape the future? Will we survive on Earth? Should we colonise space? Is time travel possible?"
),
("The Book of Joy.", "Lasting Happiness in a Changing World",
 "Dalai", "Lama",
 "book",
 "Hutchinson", "London, United Kingdom",
 "medium",
 "2016-09-22",
 false,
 "the book of joy.jpg",
 "978-1786330444",
 "Archbishop Desmond Tutu and the Dalai Lama have been friends for many, many years. Between them, they have endured exile, violence and oppression. And in the face of these hardships, they have continued to radiate compassion, humour and above all, joy. To celebrate His Holiness’s eightieth birthday, Archbishop Tutu travelled to the Dalai Lama’s home in Dharamsala. The two men spent a week discussing a single burning question: how do we find joy in the face of suffering? This book is a gift from two of the most important spiritual figures of our time. Full of love, warmth and hope, The Book of Joy offers us the chance to experience their journey from first embrace to final goodbye."
 );



insert into media
(title, subtitle, author_fn, author_ln, band_name, media_type, publisher, publisher_address, publisher_size, date_published, availability, image, description)
values
("Rough and Rowdy Ways", null,
 "Bob", "Dylan", null,
 "audio",
 "Smi Col (Sony Music)", "Culver City, California, United States",
 "big",
 "2020-06-19",
 true,
 "rough and rowdy ways.jpg",
 "'Rough and Rowdy Ways' is Bob Dylan's first album of original material in 8 years and his first since becoming the only songwriter to receive the Nobel Prize for Literature, in 2016. Its 10 tracks include the three new songs released this spring: the album's lead-off track, 'I Contain Multitudes,' the nearly 17-minute epic 'Murder Most Foul' and False Prophet."
  ),
("Abbey Road Anniversary [LP]", "Anniversary Edition",
 null, null, "The Beatles",
 "audio",
 "Capitol", "Los Angeles, California, United States",
 "big",
 "2019-09-27",
 true,
 "abbey road.jpg",
 "The new Abbey Road release features the new stereo album mix, sourced directly from the original eight-track session tapes. To produce the mix, Giles Martin working with Sam Okell, was guided by the album’s original stereo mix supervised by his father, George Martin."
 );



 insert into media
 (title, subtitle, author_fn, author_ln, stars, media_type, publisher, publisher_address, publisher_size, date_published, availability, image, description)
values
("Tenet", "Time Runs Out",
 "Cristopher", "Nolan",
 "John David Washington, Robert Pattinson, Elizabeth Debicki, Dimple Kapadia, Michael Caine, Kenneth Branagh",
 "video",
 "Warner Bros. Pictures", "Burbank, California, United States",
 "big",
 "2020-08-12",
 false,
 "tenet.jfif",
 "Tenet is an upcoming spy film written and directed by Christopher Nolan. It stars John David Washington, Robert Pattinson, Elizabeth Debicki, Dimple Kapadia, Michael Caine, and Kenneth Branagh."
),
("Emma", "Handsom, Clever and Rich.",
 "Autum", "de Wilde",
 "Anya Taylor-Joy, Johnny Flynn, Josh O'Connor, Callum Turner, Mia Goth, Miranda Hart, Bill Nighy",
 "video",
 "Focus Features", "Universal City, California, United States",
 "medium",
 "2020-02-14",
 true,
 "emma.jfif",
 "Following the antics of a young woman, Emma Woodhouse, who lives in Georgian- and Regency-era England and occupies herself with matchmaking - in sometimes misguided, often meddlesome fashion- in the lives of her friends and family."
),
("Mulan", null,
 "Niki", "Caro",
 "Liu Yifei, Donnie Yen, Jason Scott Lee, Yoson An, Gong Li, Jet Li",
 "video",
 "Walt Disney Studios Motion Pictures", "500 South Buena Vista Street, Burbank, California, United States",
 "big",
 "2020-03-09",
 true,
 "mulan.jfif",
 "When the Emperor of China issues a decree that one man per family must serve in the Imperial Army to defend the country from Northern invaders, Hua Mulan, the eldest daughter of an honored warrior, steps in to take the place of her ailing father. Masquerading as a man, Hua Jun, she is tested every step of the way and must harness her inner-strength and embrace her true potential. It is an epic journey that will transform her into an honored warrior and earn her the respect of a grateful nation…and a proud father."
),
("No Time To Die", "007",
 "Cory", "Joji Fukunaga",
 "Daniel Craig, Rami Malek, Léa Seydoux, Lashana Lynch, Ben Whishaw, Naomie Harris, Jeffrey Wright, Christoph Waltz, Ralph Fiennes",
 "video",
 "Universal Pictures", "10 Universal City Plaza, Universal City, California, United States",
 "big",
 "2020-11-12",
 false,
 "no_time_to_die_007.jfif",
 "Five years after the capture of Ernst Stavro Blofeld, James Bond has left active service. He is approached by Felix Leiter, his friend and a CIA officer, who enlists his help in the search for Valdo Obruchev, a missing scientist. When it becomes apparent that Obruchev was abducted, Bond must confront a danger of the likes which the world has never seen before."
);