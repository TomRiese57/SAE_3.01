const express = require("express");
const bodyParser = require("body-parser");

const app = express();
const port = 3000;

app.use(bodyParser.json());

let tasks = [
  { id: 1, description: "1" },
  { id: 2, description: "2" },
];

app.listen(port, () => {
  console.log("Serveur écoutant sur le port " + port);
});

app.get("/tasks", (req, res) => {
  const taskReferences = tasks.map((task) => "task/" + task.id);
  res.json(taskReferences);
});

app.get("/task/:id", (req, res) => {
  const taskId = parseInt(req.params.id);
  const task = tasks.find((task) => task.id === taskId);

  if (task) {
    res.json(task);
  } else {
    res.status(404).json({ error: "Tâche non trouvée" });
  }
});

app.post("/tasks", (req, res) => {
  const newTask = {
    id: tasks.length + 1,
    description: req.body.description,
  };
  tasks.push(newTask);
  res.status(201).json({ message: "Tâche ajouté avec succès", task: newTask });
});

app.put("/task/:id", (req, res) => {
  const taskId = parseInt(req.params.id);
  const task = tasks.find((task) => task.id === taskId);
  if (task) {
    task.description = req.body.description;
    res.json({ message: "Tâche mise à jour avec succès", task });
  } else {
    res.status(404).json({ error: "Tâche non trouvée" });
  }
});

app.delete("/task/:id", (req, res) => {
  const taskId = parseInt(req.params.id);
  tasks = tasks.filter((task) => task.id !== taskId);
  res.json({ message: "Tâche supprimée avec succès" });
});
