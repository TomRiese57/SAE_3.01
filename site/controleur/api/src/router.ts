import { Router, Request, Response } from 'express';
import * as repo from './repository';

export const myRouter =  Router();
myRouter.get('/', (req: Request, res: Response) => {
  const data = repo.getAll();
  res.json(data);
});
myRouter.post('/', (req: Request, res: Response) => {
  const {todo = null} = req.body;
  const data = repo.add(todo);
  return res.json(data);
});
myRouter.get('/:id', (req: Request, res: Response) => {
  const data = repo.getById(parseInt(req.params.id, 10));
  return res.json(data);
});